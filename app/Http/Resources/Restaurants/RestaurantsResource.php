<?php

namespace App\Http\Resources\Restaurants;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantsResource extends JsonResource
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
                'categories' => $this->categories,
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'email' => $this->email,
                'website' => $this->website,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'images' => $this->images,
            ];
    }
}
