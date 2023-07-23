<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectComponent extends Model
{
    protected $table = 'object_component';
    protected $primaryKey = 'id';

    public $timestamps = false;

    function locationObject()
    {
        return $this->belongsTo(LocationObject::class, 'object_id');
    }

    function componentInspection()
    {
        return $this->hasMany(ComponentInspection::class, 'object_component_id');
    }

    public function returnArray($object)
    {
        $inspectionArray = $object->componentInspection->last();
        if ($inspectionArray !== null) {
            $grade = isset($inspectionArray->attributes['grade']) ? $inspectionArray->attributes['grade'] : 'N/A';
            $date = isset($inspectionArray->attributes['created_at']) ? $inspectionArray->attributes['created_at'] : 'N/A';
        } else {
            $grade = 'N/A';
            $date = 'N/A';
        }
        return [
            'id' => $object->attributes['id'],
            'name' => $object->attributes['name'],
            'grade' => $grade,
            'created_at' => $date,
        ];
    }
}