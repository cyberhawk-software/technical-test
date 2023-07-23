<?php

namespace App\Http\Controllers;

use App\Models\ComponentInspection;
use App\Models\location;
use App\Models\LocationObject;
use App\Models\ObjectComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class XhrController extends Controller
{
    private $apiKey = 'RVVfODhkZjJkMzg3NzRiNDQwYWEyMDcxNjhiZDkwNzJkNTk6YWUxMDdlMTEtNTFhYS00ZjZiLWEzNTUtMTkwOTZjMzRmYWY4';
    public function addLocation(Request $request)
    {
        $data = $request->all();

        if ($data != null) {
            $location = new location();

            $response = Http::get("https://api.myptv.com/geocoding/v1/locations/by-text?searchText=" . $data['postcode'] . "countryFilter=GB&apiKey=" . $this->apiKey);
            if ($response->successful()) {
                $apiData = json_decode($response->body());
                $location->latitude = $apiData->locations[0]->referencePosition->latitude;
                $location->longitude = $apiData->locations[0]->referencePosition->longitude;
            }

            $location->name = $data['name'];
            $location->postcode = $data['postcode'];
            $location->save();
            return ['response' => 200, 'message' => 'success'];
        }
    }

    public function addObject(Request $request)
    {
        $data = $request->all();

        if ($data != null) {
            $object = new LocationObject();
            $object->location_id = $data['location'];
            $object->name = $data['name'];
            $object->image_url = $data['image'];
            $object->save();
            return ['response' => 200, 'message' => 'success'];
        }
    }

    public function addComponent(Request $request)
    {
        $data = $request->all();

        if ($data != null) {
            $component = new ObjectComponent();
            $component->object_id = $data['object'];
            $component->name = $data['name'];
            $component->save();
            return ['response' => 200, 'message' => 'success'];
        }
    }

    public function addInspection(Request $request)
    {
        $data = $request->all();

        if ($data != null) {
            $inspection = new ComponentInspection();
            $inspection->object_component_id = $data['component'];
            $inspection->grade = $data['grade'];
            $inspection->save();
            return ['response' => 200, 'message' => 'success'];
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        if ($data['id'] && $data['object']) {

            $model = "App\\Models\\" . $data['object'];
            $item = $model::find($data['id']);
            $item->delete();
            return ['response' => 200, 'message' => 'success'];
        } else {
            // Handle the case where the class doesn't exist


        }
    }
}