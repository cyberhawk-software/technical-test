<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Turbine extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
      'name'
    ];

    /**
     * @var array|array[]
     */
    protected array $available_filters = [
        'name' => ['type' => 'like'],
        'component' => ['type' => 'like-relation', 'relation' => 'components', 'field' => 'name', 'hide' => true],
        'rate' => ['type' => 'equal-relation', 'field' => 'rating'],
    ];

    public function components(): BelongsToMany
    {
        return $this->belongsToMany(
            Component::class,
            'turbine_components'
        )->using(TurbineComponent::class)->withPivot(['rating']);
    }

    public function getAvailableFilters($getHide = true): array
    {
        if ($getHide) {
            return $this->available_filters;
        }

        return collect($this->available_filters)->filter(function ($item) {
            return !isset($item['hide']) || !$item['hide'];
        })->toArray();
    }
}
