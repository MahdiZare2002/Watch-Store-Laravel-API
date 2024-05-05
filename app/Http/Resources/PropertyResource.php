<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'property_group' => $this->property_group->title
        ];
    }
}
