<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Truck>
 */
class TruckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_number' => $this->faker->slug(1),
            'year' => $this->faker->numberBetween(1900,2024),
            'notes' => $this->faker->sentence(),
        ];
    }
}
