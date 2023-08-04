<?php

namespace App\Http\Resources\LocalEat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocalEatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'link' => $this->link,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'images' => $this->images,
            ];
    }
}
