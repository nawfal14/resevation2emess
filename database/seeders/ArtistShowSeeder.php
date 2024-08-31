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

        foreach ($shows as $show) {
            $assignedArtists = $artists->random(rand(1, min(3, $artists->count())));
            $show->artists()->attach($assignedArtists->pluck('id')->toArray());
        }
    }
}
