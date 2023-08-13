<?php

namespace Database\Factories;

use App\Enums\ComponentRate;
use App\Models\Component;
use App\Models\Turbine;
use App\Models\TurbineComponent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TurbineComponent>
 */
class TurbineComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'turbine_id' => $this->faker->randomElement(array_column(Turbine::all('id')->toArray(), 'id')),
            'component_id' => $this->faker->randomElement(array_column(Component::all('id')->toArray(), 'id')),
            'rating' => $this->faker->randomElement(
                [
                    ComponentRate::Perfect,
                    ComponentRate::HasSomethingWrong,
                    ComponentRate::NeedAttention,
                    ComponentRate::NeedToBeFixed,
                    ComponentRate::CompletelyBroken
                ]
            ),
        ];
    }
}
