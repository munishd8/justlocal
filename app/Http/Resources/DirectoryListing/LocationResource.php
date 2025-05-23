<?php

namespace App\Http\Resources\DirectoryListing;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
                'slug' => $this->name,
                'description' => $this->description,
                'image' => $this->image,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'children' => $this->children,
            ];
    }
}
