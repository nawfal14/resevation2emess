<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Type;

class ArtistSeeder extends Seeder
{
    public function run(): void
    {
        $types = Type::all();
        Artist::factory(10)->create()->each(function ($artist) use ($types) {
            $artist->types()->attach(
                $types->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
