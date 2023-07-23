<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Models\LocationObject;
use Illuminate\Http\Request;

class LocationObjectController extends Controller
{
    public function index($locationId)
    {
        $location = location::find($locationId);
        if ($location) {
            $objectsArray = $location->locationObjects;
            $location = (new location)->returnArray($location);

            if ($objectsArray) {
                $objects = [];
                foreach ($objectsArray as $single) {
                    $objects[] = (new LocationObject())->returnArray($single);
                }
            }
            $data = ['location' => $location, 'table' => $objects];
            return view('pages.location', $data);
        }
    }
}