<?php

namespace App\Models;

use App\Models\Interfaces\NotificationInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurbineComponent extends Model implements NotificationInterface
{
    use HasFactory;

    public function getTurbineId(): string
    {
        // TODO: Implement getTurbineId() method.
    }

    public function getComponentId(): string
    {
        // TODO: Implement getComponentId() method.
    }

    public function getComponentRank(): string
    {
        // TODO: Implement getComponentRank() method.
    }

    public function getComponentOldRank(): string
    {
        // TODO: Implement getComponentOldRank() method.
    }

    public function getTurbineState(): string
    {
        // TODO: Implement getTurbineState() method.
    }
}
