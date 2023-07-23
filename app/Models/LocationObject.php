<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationObject extends Model
{

    protected $table = 'location_object';
    protected $primaryKey = 'id';

    public $timestamps = false;

    function location()
    {
        return $this->belongsTo('location', 'id');
    }

    function objectComponent()
    {
        return $this->hasMany(ObjectComponent::class, 'object_id');
    }

    public function returnArray($object)
    {
        return [
            'id' => $object->attributes['id'],
            'name' => $object->attributes['name'],
            'image' => $object->attributes['image_url'],
        ];
    }

}