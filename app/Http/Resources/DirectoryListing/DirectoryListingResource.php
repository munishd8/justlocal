<?php

namespace App\Http\Resources\DirectoryListing;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DirectoryListingResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'is_card_view_featured' => $this->is_card_view_featured,
            'card' => $this->card,
            'is_local_support_view_featured' => $this->is_local_support_view_featured,
            'local_support_image' => $this->local_support_image,
            'excerpt' => $this->excerpt,
            'address' => $this->address,
            'video_url' => $this->video_url,
            'images' => $this->images,
            'contact_information' => $this->contactInformation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
        ];
    }
}
