<?php

namespace App\Http\Resources\PlanningApplication;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanningApplicationResource extends JsonResource
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
                'slug' => $this->slug,
                'details' => $this->details,
                'applicant_name' => $this->applicant_name,
                'planning_reference' => $this->planning_reference,
                'registration_date' =>  Carbon::parse($this->registration_date)->format('d,M Y h:iA'),
                'due_submit_date' => Carbon::parse($this->due_submit_date)->format('d,M Y h:iA'),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'images' => $this->images,
            ];
    }
}
