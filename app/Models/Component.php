<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Turbine;

class Component extends Model
{
    use HasFactory;

    protected $fillable = ['turbine_id','name','type','grade'];

    /** Set getters and setters below*/
    
    /**ORM */
    public function turbine()
    {
        return $this->belongsTo(Turbine::class,'tubine_id','id');
    }

}
