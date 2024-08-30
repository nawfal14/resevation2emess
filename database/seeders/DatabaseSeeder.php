<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // 1 
            TypeSeeder::class,
            LocalitySeeder::class,
            UserSeeder::class,

            // 2
            ArtistSeeder::class,
            LocationSeeder::class,
            ShowSeeder::class,

            // 3
            RepresentationSeeder::class,

        ]);
    }
}