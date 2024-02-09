<?php
  
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class TurbineComponent extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'component_id' => $this->component_id,
            'component' => new Component($this->components),
            'grade' => $this->grade,
            'specification' => $this->specification,
            'status' => $this->status,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }
    
}