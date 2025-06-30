<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
// This model represents a User in the application, with relationships to tasks and authentication features.
// It uses the HasFactory trait for factory-based testing and Notifiable for notifications.
// This model includes attributes for mass assignment, hidden attributes for serialization, and casts for specific data types.
// The `tasks` method defines a one-to-many relationship with the Task model, allowing access to the user's tasks.
// This model is essential for user management, authentication, and task association in the application.
// The User model is a core part of the application, providing user authentication and task management capabilities.
// It is designed to work with Laravel's built-in authentication system and supports user-related operations such as registration, login, and task management.
// The model is structured to ensure security and performance, with appropriate attributes for mass assignment and serialization.
// The `casts` method ensures that certain attributes are automatically converted to specific data types, enhancing data integrity and usability.
// The User model is integral to the application's functionality, enabling user interactions and task management through a clean and efficient interface.
// It is built to leverage Laravel's features, ensuring a robust and scalable user management system.
// The model's relationships and attributes are designed to facilitate easy access to user-related data, making it a key component of the application's architecture.
// The User model is essential for managing user accounts, handling authentication, and associating users with tasks.
// It provides a structured way to manage user data, ensuring that user interactions with the application are secure and efficient.
// The model's design follows best practices for Laravel applications, ensuring maintainability and scalability.
// The User model is a fundamental part of the application, providing a foundation for user management and task association.
// It is designed to work seamlessly with Laravel's authentication and authorization features, ensuring a secure and efficient user experience.
// The model's attributes and relationships are structured to support various user-related operations,
// making it a versatile and essential component of the application's architecture.
// The User model is a key part of the application, providing user authentication and task management capabilities.
// It is designed to work with Laravel's built-in authentication system and supports user-related operations such as registration, login, and task management.
// The model is structured to ensure security and performance, with appropriate attributes for mass assignment and serialization.
// The `casts` method ensures that certain attributes are automatically converted to specific data types, enhancing data integrity and usability.
// The User model is integral to the application's functionality, enabling user interactions and task management through a clean and efficient interface.
// It is built to leverage Laravel's features, ensuring a robust and scalable user management system.
// The model's relationships and attributes are designed to facilitate easy access to user-related data, making it a key component of the application's architecture.
// The User model is essential for managing user accounts, handling authentication, and associating users with tasks.
// It provides a structured way to manage user data, ensuring that user interactions with the application are secure and efficient.
// The model's design follows best practices for Laravel applications, ensuring maintainability and scalability.
// The User model is a fundamental part of the application, providing a foundation for user management and task association.
// It is designed to work seamlessly with Laravel's authentication and authorization features, ensuring a secure and efficient user experience.
// The model's attributes and relationships are structured to support various user-related operations,
// making it a versatile and essential component of the application's architecture. 