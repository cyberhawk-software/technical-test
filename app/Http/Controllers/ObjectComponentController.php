<?php

namespace App\Http\Controllers;

use App\Models\LocationObject;
use App\Models\ObjectComponent;
use Illuminate\Http\Request;

class ObjectComponentController extends Controller
{
    public function index($objectId)
    {
        $object = LocationObject::find($objectId);
        if ($object) {
            $ComponentsArray = $object->objectComponent;
            $object = (new LocationObject)->returnArray($object);
            if ($ComponentsArray) {
                $objects = [];
                foreach ($ComponentsArray as $single) {
                    $objects[] = (new ObjectComponent())->returnArray($single);
                }
            }
        }

        $data = ['object' => $object, 'table' => $objects];
        return view('pages.component', $data);
    }
}