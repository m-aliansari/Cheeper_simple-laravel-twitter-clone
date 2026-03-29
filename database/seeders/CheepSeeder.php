<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a few sample users if they don't exist
        if (User::count() < 3) {
            User::create([
                'name' => 'Alice Developer',
                'email' => 'alice@example.com',
                'password' => bcrypt('password'),
            ]);
            User::create([
                'name' => 'Bob Builder',
                'email' => 'bob@example.com',
                'password' => bcrypt('password'),
            ]);
            User::create([
                'name' => 'Charlie Coder',
                'email' => 'charlie@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        $users = User::take(3)->get();

        // Sample Cheeps
        $cheeps = [
            'Just discovered Laravel - Where has this been all my life?🚀',
            'Building something cool with PHP today!',
            'Laravel\'s Eloquent ORM is pure magic ✨',
            'Deployed my first app with Laravel Cloud. So smooth!',
            'Who else is loving Blade components?',
            'Friday deploys with Laravel? No problem! 😎'
        ];

        // Create cheeps for random users
        foreach ($cheeps as $message) {
            $users->random()->cheeps()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
