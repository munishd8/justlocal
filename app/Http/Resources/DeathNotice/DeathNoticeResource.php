<?php

namespace App\Http\Resources\DeathNotice;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeathNoticeResource extends JsonResource
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
                'date_of_birth' => Carbon::parse($this->date_of_birth)->format('d,M Y h:iA'),
                'date_of_death' => Carbon::parse($this->date_of_death)->format('d,M Y h:iA'),
                'notice_date' => Carbon::parse($this->notice_date)->format('d,M Y h:iA'),
                'notice_link' => $this->notice_link,
                'link' => $this->link,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'images' => $this->images,
            ];
    }
}
