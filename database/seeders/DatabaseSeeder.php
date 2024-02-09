<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            ComponentsSeeder::class
        ]);

        //\App\Models\User::factory(1)->create();
        //\App\Models\Turbine::factory()->count(5)->create();
        //\App\Models\TurbineComponent::factory()->count(5)->create();
    }
}
