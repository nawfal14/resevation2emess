<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->admin()->create([
            'firstname' => 'Admin',
            'lastname' => 'User',
            'login' => 'admin',
            'email' => 'admin@example.com',
        ]);

        User::factory(10)->create();
    }
}
