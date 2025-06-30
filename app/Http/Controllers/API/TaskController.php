<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task; // Ensure you have the Task model imported
use App\Models\User; // Ensure you have the User model imported
use App\Http\Resources\TaskResource; // Import TaskResource if needed
use Illuminate\Console\View\TaskResult;
use App\Http\Requests\API\TaskRequest; // Import TaskRequest if you need to validate requests
use GuzzleHttp\Psr7\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(Task::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1,2',
        ]);

        $user = auth()->user();
        $task = $user->tasks()->create([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return response()->json([
            'message' => 'Task created successfully',
            "task_id" => $task->id,

        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return  TaskResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update([
            'name' => $request->name,

        ]);
        return TaskResource::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // $task = Task::findOrFail($task);
        $task->delete();
        return response()->json([
            'message' => 'Task deleted successfully',
        ], 200);
    }
}
