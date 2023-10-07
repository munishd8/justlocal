<?php

namespace App\Http\Resources;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class favoritePostsResource extends JsonResource
{
    
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       $image =  Image::where('imageable_id',$this->post_id)->where('imageable_type','App\Models\Post')->first('image');
       $image = ($image)? $image->image : null;
       if(!($image))
        {
            $image = null;
        }
        return [
            'post_id' => $this->post_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'image' => $image,

        ];
    }
}
