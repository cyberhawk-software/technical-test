<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Component extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    public function components(): BelongsToMany
    {
        return $this->belongsToMany(Turbine::class, TurbineComponent::class, 'component_id', 'turbine_id');
    }
}
