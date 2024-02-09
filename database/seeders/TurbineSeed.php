<?php

namespace Database\Seeders;

use App\Models\Turbine;
use Illuminate\Database\Seeder;

class TurbineSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turbine::factory()->count(50)->create();
    }
}
