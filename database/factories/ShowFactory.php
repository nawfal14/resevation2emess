<?php

namespace Database\Factories;

use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShowFactory extends Factory
{
    protected $model = Show::class;

    public function definition()
    {
        return [
            'slug' => Str::slug(Str::limit($this->faker->unique()->sentence(3), 60)),
            'title' => Str::limit($this->faker->sentence(3), 255),
            'poster_url' => $this->faker->imageUrl(640, 480, 'shows', true),
            'duration' => $this->faker->numberBetween(60, 180),
            'created_in' => $this->faker->year(),
            'location_id' => \App\Models\Location::factory(),
            'bookable' => $this->faker->boolean(),
        ];
    }
}