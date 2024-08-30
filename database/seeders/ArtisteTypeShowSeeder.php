<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Artist;
use App\Models\Type;
use App\Models\Show;

class ArtisteTypeShowSeeder extends Seeder
{
    public function run()
    {
        $artists = Artist::all();
        $types = Type::all();
        $shows = Show::all();

        foreach ($artists as $artist) {
            foreach ($types->random(rand(1, 3)) as $type) {
                foreach ($shows->random(rand(1, 3)) as $show) {
                    DB::table('artiste_type_show')->insert([
                        'artist_id' => $artist->id,
                        'type_id' => $type->id,
                        'show_id' => $show->id,
                    ]);
                }
            }
        }
    }
}