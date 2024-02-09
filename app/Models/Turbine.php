<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turbine extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'status', 'specification'];
    protected $with = ['turbinecomponents'];

    public function turbinecomponents()
    {
        return $this->hasMany(TurbineComponent::class, 'turbine_id');
    }

}
