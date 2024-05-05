<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColorResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'code' => $this->code
        ];
    }
}
