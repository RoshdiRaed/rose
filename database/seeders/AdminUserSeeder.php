<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user or create one if none exists
        $user = User::first();
        
        if ($user) {
            // Update the first user to be an admin
            $user->update([
                'is_admin' => true,
                'email' => 'admin@example.com', // Ensure a known email
                'password' => Hash::make('password'), // Reset to a known password
            ]);
            
            $this->command->info('First user has been set as an admin.');
            $this->command->info('Email: admin@example.com');
            $this->command->info('Password: password');
        } else {
            // Create a new admin user if no users exist
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]);
            
            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: admin@example.com');
            $this->command->info('Password: password');
        }
    }
}
