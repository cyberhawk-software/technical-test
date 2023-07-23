<?php

namespace App\Http\Controllers;

use App\Models\ComponentInspection;
use App\Models\ObjectComponent;
use Illuminate\Http\Request;

class ComponentInspectionController extends Controller
{
    public function index($componentId)
    {
        $component = ObjectComponent::find($componentId);
        if ($component) {
            $inspectionArray = $component->componentInspection;
            $component = (new ObjectComponent)->returnArray($component);

            if ($inspectionArray) {
                $inspections = [];
                foreach ($inspectionArray as $single) {
                    $inspections[] = (new ComponentInspection())->returnArray($single);
                }
            }
        }
        $data = ['component' => $component, 'table' => $inspections];
        return view('pages.inspection', $data);
    }
}