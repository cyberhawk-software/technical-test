<?php

namespace Database\Factories;

use App\Models\Turbine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Turbine>
 */
class TurbineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return ['name' => $this->faker->companySuffix()];
    }
}
