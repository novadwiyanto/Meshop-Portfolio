<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::insert([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$DVXwcijKFl73VicDVng1ZebavaptHPvlyW5awQ6uWEzATy5tsGduG',
            'roles' => 'user',
            'remember_token' => Str::random(10),
        ]);

        User::insert([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$DVXwcijKFl73VicDVng1ZebavaptHPvlyW5awQ6uWEzATy5tsGduG',
            'roles' => 'user',
            'remember_token' => Str::random(10),
        ]);

        User::insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$DVXwcijKFl73VicDVng1ZebavaptHPvlyW5awQ6uWEzATy5tsGduG',
            'roles' => 'admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
