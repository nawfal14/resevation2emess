<?php

namespace Database\Seeders;

use App\Models\Locality;
use Illuminate\Database\Seeder;

class LocalitySeeder extends Seeder
{
    public function run(): void
    {
        Locality::factory()->count(10)->create();
    }
}
