<?php

namespace App\Http\Resources\DirectoryListing;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryDirectoryListingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $contactNumbers = $this->contactInformation->contactNumbers;
        $phones = [];
    
        foreach ($contactNumbers as $number) {
            if ($number->type_name === 'Phone') {
                $phones['phone'] = $number->pivot->phone_number;
            } elseif ($number->type_name === 'Phone 2') {
                $phones['phone_2'] = $number->pivot->phone_number;
            } elseif ($number->type_name === 'Phone 3') {
                $phones['phone_3'] = $number->pivot->phone_number;
            } else {
                $phones['phone_4'] = $number->pivot->phone_number;  
            }
        }

        return [
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
            'hide_contact' => $this->contactInformation->hide_contact,
            'zip_code' => $this->contactInformation->zip_code,
            'zip_code' => $this->contactInformation->zip_code,
            'fax' => $this->contactInformation->fax,
            'email' => $this->contactInformation->email,
            'website' => $this->contactInformation->website,
            'contact_excerpt' => $this->contactInformation->contact_excerpt,
            'contact_info_content' => $this->contactInformation->contact_info_content,
            'contact_images' => $this->contactInformation->images,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'images' => $this->images,
            // 'no' => $this->contactInformation->contactNumbers,
            'phones' => $phones,
        ];

        // $numbers = $this->directoryListing->contactInformation->contactNumbers;

        // if($numbers->count() > 0){
        //     foreach($numbers as $number)
        //     {
        //         if($number->type_name == 'Phone'){
        //             $this->phone = $number->pivot->phone_number;
        //         }elseif($number->type_name == 'Phone 2'){
        //             $this->phone_2 = $number->pivot->phone_number;
        //         }elseif($number->type_name == 'Phone 3'){
        //             $this->phone_3 = $number->pivot->phone_number;
        //         }else{
        //             $this->phone_4 = $number->pivot->phone_number;
        //         }
        //     }
        // }
        


    }
}
