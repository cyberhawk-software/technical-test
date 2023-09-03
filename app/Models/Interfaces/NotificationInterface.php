<?php

namespace App\Models\Interfaces;

interface NotificationInterface
{
    public function getTurbineId(): string;
    public function getComponentId(): string;
    public function getComponentRank(): string;
    public function getComponentOldRank(): string;
    public function getTurbineState(): string;
}
