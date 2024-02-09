<?php

namespace Database\Seeders;

use App\Models\TurbineComponent;
use Illuminate\Database\Seeder;

class TurbineComponentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TurbineComponent::factory()->count(100)->create();
    }
}
