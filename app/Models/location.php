<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LocationObject;

class location extends Model
{
    protected $table = 'location';

    function locationObjects()
    {
        return $this->hasMany(LocationObject::class, 'location_id');
    }

    public function getDashboard()
    {
        $location = $this::all();
        if ($location) {
            $data = [];
            foreach ($location as $single) {
                $data[] = $this->returnArray($single);
            }
            return $data;
        }
    }

    public function returnArray($object)
    {
        return [
            'id' => $object->attributes['id'],
            'name' => $object->attributes['name'],
            'postcode' => $object->attributes['postcode'],
            'latitude' => $object->attributes['latitude'],
            'longitude' => $object->attributes['longitude'],
            'updated_at' => $object->attributes['updated_at'],
        ];
    }
}