<?php

namespace App\Http\Resources\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        // if(!empty($this->comments)){
            $comments = $this->comments->map(function ($comments) {
                return [
                    'name' => $comments->name,
                    'email' => $comments->email,
                    'content' => $comments->content,
                    'created_at' => $comments->created_at->format('d, M Y h:iA')
                ];
            });

        // }else{
        //     $comments = []; 
        // }


        return
            [
                'id' => $this->id,
                'title' => $this->title,
                'slug' => $this->slug,
                'content' => $this->content,
                'categories' => $this->categories,
                'excerpt' => $this->excerpt,
                'link' => $this->link,
                'is_featured' => $this->is_featured,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'images' => $this->images,
                'comments' => $comments,
            ];
    }
}
