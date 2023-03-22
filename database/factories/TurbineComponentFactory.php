<?php

namespace Database\Factories;

use App\Models\Turbine;
use App\Models\Component;
use App\Models\TurbineComponent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TurbineComponent>
 */
class TurbineComponentFactory extends Factory
{
    protected $model = TurbineComponent::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'turbine_id' => Turbine::inRandomOrder()->first()->id,
            'component_id' => Component::inRandomOrder()->first()->id,
            'specification' => $this->faker->realText(300)
        ];
    }
}
