<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Component;

class ComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [ ['name' => 'Blade'],['name' => 'Rotor'],['name' => 'Hub'],['name' => 'Generator']];
        Component::insert($data);
    }
}

