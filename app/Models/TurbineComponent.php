<?php

namespace App\Models;

use App\Enums\ComponentRate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TurbineComponent extends Pivot
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'turbine_id',
        'component_id',
        'rating'
    ];

    protected $casts = [
        'rating' => ComponentRate::class
    ];

    public function turbine(): HasOne
    {
        return $this->hasOne(Turbine::class, 'turbine_id');
    }

    public function component(): HasOne
    {
        return $this->hasOne(Component::class, 'component_id');
    }
}
