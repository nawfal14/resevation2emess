<?php

use Illuminate\Database\Seeder;
use App\Models\Show;
use App\Models\Location;
use App\Models\Representation;

class RepresentationSeeder extends Seeder
{
    public function run()
    {
        $shows = Show::all();
        $locations = Location::all();

        foreach ($shows as $show) {
            Representation::create([
                'show_id' => $show->id,
                'schedule' => now()->addDays(rand(1, 30)),
                'location_id' => $locations->random()->id,
            ]);
        }
    }
}