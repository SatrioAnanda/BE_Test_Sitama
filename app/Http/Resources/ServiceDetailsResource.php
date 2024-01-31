<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'group' => $this->group,
            'parent_description' => $this->parent_description,
            'description' => $this->description,
            'mandatory' => $this->mandatory,
            'sequence' => $this->sequence,
            'parent' => $this->parent,
            'type' => $this->type,
            'is_multiple' => $this->is_multiple,
            'remark' => $this->remark,
            'value' => "",
        ];
    }
}
