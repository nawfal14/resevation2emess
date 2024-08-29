<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition()
    {
        return [
            'slug' => substr($this->faker->slug, 0, 60),
            'designation' => substr($this->faker->company, 0, 60),
            'address' => substr($this->faker->address, 0, 255),
            'locality_id' => Locality::factory(),
            'website' => $this->faker->url,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}