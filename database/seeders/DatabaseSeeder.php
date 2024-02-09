<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Turbine;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $grades = [1=>"Perfect", 2=>"Good", 3=>"Acceptable", 4=>"Bad", 5=>"Poor" ];
        foreach($grades as $key => $value){
            $grade = \App\Models\Grade::create([
                'grade' => $key,
                'grade_value'=>$value
            ]);
        }
        
        \App\Models\Turbine::factory(10)->create();

        $turbines = Turbine::all();
        foreach($turbines as $turbine){
            $component = \App\Models\Component::create([
                'turbine_id'=>$turbine->id,
                'type'=>'blade',
                'name'=>'blade_one',
                'grade' => 2
            ]);
            $component = \App\Models\Component::create([
                'turbine_id'=>$turbine->id,
                'type'=>'blade',
                'name'=>'blade_two',
                'grade' => 3
            ]);
            $component = \App\Models\Component::create([
                'turbine_id'=>$turbine->id,
                'type'=>'blade',
                'name'=>'blade_three',
                'grade' => 2
            ]);
            $component = \App\Models\Component::create([
                'turbine_id'=>$turbine->id,
                'type'=>'hub',
                'name'=>'hub',
                'grade' => 5
            ]);
            $component = \App\Models\Component::create([
                'turbine_id'=>$turbine->id,
                'type'=>'rotor',
                'name'=>'rotor',
                'grade' => 1
            ]);
            $component = \App\Models\Component::create([
                'turbine_id'=>$turbine->id,
                'type'=>'generator',
                'name'=>'generator',
                'grade' => 1
            ]);


        }
        
       
    }
}
