<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Show;

class ArtistShowSeeder extends Seeder
{
    public function run(): void
    {

        $artists = Artist::all();
        $shows = Show::all();

        $artists->each(function ($artist) use ($shows) {
            $artist->shows()->attach(
                $shows->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
