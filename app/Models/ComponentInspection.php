<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentInspection extends Model
{
    protected $table = 'inspection';
    protected $primaryKey = 'id';
    function componentInpection()
    {
        return $this->belongsTo(ObjectComponent::class, 'object_component_id');
    }

    public function returnArray($object)
    {
        return [
            'id' => $object->attributes['id'],
            'grade' => $object->attributes['grade'],
            'created_at' => $object->attributes['created_at'],
        ];
    }
}