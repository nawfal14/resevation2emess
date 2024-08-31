<?php

namespace Database\Factories;

use App\Models\Price;
use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    protected $model = Price::class;

    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['Standard', 'VIP', 'Student']),
            'price' => $this->faker->randomFloat(2, 10, 150), // prix entre 10 et 150
            'start_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'show_id' => Show::factory(),
        ];
    }
}