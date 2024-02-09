<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurbineComponent extends Model
{
    use HasFactory;
    protected $fillable = ['turbine_id', 'component_id', 'grade', 'specification', 'status'];
    protected $with = ['components'];

    public function components() {
        return $this->belongsTo(Component::class, 'component_id');
    }

    public function turbines() {
        
        return $this->belongsTo(Turbine::class, 'turbine_id');
    }

}
