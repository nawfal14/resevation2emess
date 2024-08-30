<?php

namespace Database\Seeders;

use App\Models\Show;
use App\Models\Price;
use Illuminate\Database\Seeder;

class ShowSeeder extends Seeder
{
    public function run(): void
    {
        // creee plusieurs shows, chacun avec 3 prix
        Show::factory(10)->create()->each(function ($show) {
            Price::factory(3)->create([
                'show_id' => $show->id,
            ]);
        });
    }
}