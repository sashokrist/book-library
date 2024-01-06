<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Import your User model

class CreateAdminUser extends Command
{
    protected $signature = 'user:create-admin';
    protected $description = 'Create a new admin user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $firstName = $this->ask('Enter first name');
        $lastName = $this->ask('Enter last name');
        $email = $this->ask('Enter email');
        $password = $this->secret('Enter password');
        $isAdmin = $this->ask('Is user an admin? (1/0))');

        // Validate email and password (basic validation)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Invalid email format');
            return;
        }

        if (strlen($password) < 8) {
            $this->error('Password must be at least 8 characters');
            return;
        }

        // Create user and set isAdmin field
        User::create([
            'name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => bcrypt($password),
            'isAdmin' => $isAdmin,
        ]);

        $this->info('Admin user created successfully!');
    }
}
