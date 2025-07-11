<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(BookSeeder::class);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}
