<?php

namespace Database\Factories;
use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalityFactory extends Factory
{
    protected $model = Locality::class;

    public function definition()
    {
        return [
            'postal_code' => $this->faker->regexify('[0-9]{4}'),
            'locality' => $this->faker->city,
        ];
    }
}
