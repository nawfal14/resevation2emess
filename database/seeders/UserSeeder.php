<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::factory()->admin()->create([
            'firstname' => 'Admin',
            'lastname' => 'User',
            'login' => 'admin',
            'email' => 'admin@example.com',
        ]);

        // Create regular users
        User::factory(10)->create(); // Creates 10 regular users
    }
}
