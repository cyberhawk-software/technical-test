<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Blade;
use App\Models\Hub;
use App\Models\Rotor;
use App\Models\Generator;
use App\Models\Component;

class Turbine extends Model
{
    use HasFactory;

    protected $fillable = ['location','longitude','latitude'];

    /** Set getters and setters below*/
        

    public static function getById($id)
    {
        return static::where('id','=',$id)->get();
    }

    /** ORM */

    public function components()
    {
        return $this->hasMany(Component::class,'turbine_id','id');
    }
}
