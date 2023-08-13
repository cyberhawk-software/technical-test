<?php

namespace Database\Factories;

use App\Models\Component;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Component>
 */
class ComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(
                [
                    'Blade',
                    'Rotor',
                    'Hub',
                    'Generator',
                    'Nacelle',
                    'Low speed shaft',
                    'Gearbox',
                    'Tower',
                    'Anemometer',
                    'Wind vane'
                ]
            )
        ];
    }
}
