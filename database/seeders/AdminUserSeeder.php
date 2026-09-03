<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::where('email', 'admin@lekkiashram.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@lekkiashram.com',
                'password' => Hash::make('password'),
            ]);

            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: admin@lekkiashram.com');
            $this->command->info('Password: password');
        } else {
            $this->command->info('Admin user already exists. Skipping...');
        }
    }
}