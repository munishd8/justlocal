<?php

namespace App\Http\Livewire\DirectoryListings;

use App\Models\DirectoryListing;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;
use App\Models\PhoneType;

class EditDirectoryListingWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $failMessage = '';
    public $contactFailMessage = '';
    public $directoryListingCategories;
    public $directoryListingLocations;
    public $directoryListing;
    public $categories = [];
    public $parent_category;
    public $locations = [];
    public $parent_location;
    public $title;
    public $content;
    public $excerpt;
    public $is_card_view_featured;
    public $card;
    public $old_card;
    public $is_local_support_view_featured;
    public $local_support_image;
    public $old_local_support_image;
    public $is_featured;
    public $images;
    public $listing_imgs;
    public $address;
    public $video_url;
    public $hide_contact;
    public $zip_code;
    public $fax;
    public $email;
    public $website;
    public $contact_excerpt;
    public $contact_info_content;
    public $contact_images;
    public $contact_imgs;
    public $phone;
    public $phone_2;
    public $phone_3;
    public $phone_4;


    protected $rules = [
        'title' => 'required',
        'content' => 'required|string',
        // 'images' => 'required|max:2048',
        'address' => 'required|string|max:255',
        'video_url' => 'required|string|max:255',
        'zip_code' => 'required|string|max:255',
        'fax' => 'required|string|max:255',
        'email' => 'required|string|email',
        'website' => 'required|string|max:255',
        'contact_excerpt' => 'required|string',
        'contact_info_content' => 'required|string',
        // 'contact_images' => 'required|max:2048',
        'phone' => 'required',

    ];

    protected $messages = [
        'title.required' => 'The Directory Listing cannot be empty.',
        'content.required' => 'The Directory Listing Content cannot be empty',
        // 'images' => 'Please Select atleast One Image.',
        'items.required' => 'The No of Items cannot be empty',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($directoryListing)
    {
        $this->directoryListing = $directoryListing;
        $this->title = $this->directoryListing->title;
        $this->content = $this->directoryListing->content;
        $this->excerpt = $this->directoryListing->excerpt;
        $this->listing_imgs = $this->directoryListing->images;
        $this->is_card_view_featured = $this->directoryListing->is_card_view_featured;
        $this->old_card = $this->directoryListing->card;
        // $this->card = $this->directoryListing->card;
        $this->is_local_support_view_featured = $this->directoryListing->is_local_support_view_featured;
        // $this->local_support_image = $this->directoryListing->local_support_image;
        $this->old_local_support_image = $this->directoryListing->local_support_image;
        $this->address = $this->directoryListing->address;
        $this->video_url = $this->directoryListing->video_url;
        $this->hide_contact = $this->directoryListing->contactInformation->hide_contact;
        $this->zip_code = $this->directoryListing->contactInformation->zip_code;
        $this->fax = $this->directoryListing->contactInformation->fax;
        $this->email = $this->directoryListing->contactInformation->email;
        $this->website = $this->directoryListing->contactInformation->website;
        $this->contact_excerpt = $this->directoryListing->contactInformation->contact_excerpt;
        $this->contact_info_content = $this->directoryListing->contactInformation->contact_info_content;
        $this->contact_imgs = $this->directoryListing->contactInformation->images;

        $this->parent_category = $this->directoryListing->categories->pluck('id')->toArray();
        $this->categories = $this->parent_category;

        $this->parent_location = $this->directoryListing->locations->pluck('id')->toArray();
        $this->locations = $this->parent_location;

        // public $locations = [];
        // dd($this->selectedDirectoryListingCategories);
        $numbers = $this->directoryListing->contactInformation->contactNumbers;

        if($numbers->count() > 0){
            foreach($numbers as $number)
            {
                if($number->type_name == 'Phone'){
                    $this->phone = $number->pivot->phone_number;
                }elseif($number->type_name == 'Phone 2'){
                    $this->phone_2 = $number->pivot->phone_number;
                }elseif($number->type_name == 'Phone 3'){
                    $this->phone_3 = $number->pivot->phone_number;
                }else{
                    $this->phone_4 = $number->pivot->phone_number;
                }
            }
        }

    }

    public function deleteImage($imageId)
    {
        if($this->directoryListing->images->count() >= 2){
            $image = Image::findOrFail($imageId);
            $oldUrl =  'upload/'.$image->image;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $image->delete();
            $this->directoryListing->load('images');
        }else{
            $this->failMessage = 'At least one image is required.';
            $this->reset('images');
        }

    }

    public function deleteContactImage($imageId)
    {
        if($this->directoryListing->contactInformation->images->count() >= 2){
            $image = Image::findOrFail($imageId);
            $oldUrl =  'upload/'.$image->image;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $image->delete();
            $this->directoryListing->contactInformation->load('images');
        }else{
            $this->contactFailMessage = 'At least one image is required.';
            $this->reset('images');
        }

    }


    public function editListings()
    {
        $validatedData = $this->validate();
        $validatedData['menu_id'] = 3;

        if ($this->is_card_view_featured == 1 && isset($this->card)) {
            $extension  = $this->card->getClientOriginalExtension();
            $path_card = $this->card->storeAs('images/directoryListing/card', $this->title . '-' . rand(100, 999) . '.' . $extension, 'public');
        }
        $path_card = (isset($path_card)) ? $path_card : NULL;
        $this->is_local_support_view_featured = ($this->is_local_support_view_featured == 1) ? 1 : 0;

        if ($this->is_local_support_view_featured == 1 && isset($this->local_support_image)) {
            $extension  = $this->local_support_image->getClientOriginalExtension();
            $local_support = $this->local_support_image->storeAs('images/directoryListing/localSupport', $this->title . '-' . rand(100, 999) . '.' . $extension, 'public');
        }
        $local_support = (isset($local_support)) ? $local_support : NULL;
        $this->is_local_support_view_featured = ($this->is_local_support_view_featured == 1) ? 1 : 0;
        $directoryListing =  $this->directoryListing->update($validatedData + ['excerpt' => $this->excerpt, 'is_card_view_featured' => $this->is_card_view_featured, 'card' => $path_card, 'is_local_support_view_featured' => $this->is_local_support_view_featured, 'local_support_image' => $local_support, 'excerpt' => $this->excerpt]);
        
        $this->directoryListing->categories()->sync($this->categories);
        $this->directoryListing->locations()->sync($this->locations);

        $this->hide_contact = ($this->hide_contact == 1) ? 1 : 0;
        $contact =  $this->directoryListing->contactInformation()->update([
            'hide_contact' => $this->hide_contact,
            'zip_code' => $this->zip_code,
            'fax' => $this->fax,
            'email' => $this->email,
            'website' => $this->website,
            'contact_excerpt' => $this->contact_excerpt,
            'contact_info_content' => $this->contact_info_content,
        ]);
        // $phones = [$this->phone,$this->phone_2,$this->phone_3,$this->phone_4];
        // $phoneTypes = PhoneType::all();
        // foreach ($phoneTypes as $phoneType) {
        //     foreach ($phones as $phone) {
        //         if(isset($phone)){
        //         $contact->contactNumbers()->attach($phoneType, ['phone_number' => $phone]);
        //     }
        // }
        // }

        $phones = [$this->phone, $this->phone_2, $this->phone_3, $this->phone_4];
        $phoneTypes = PhoneType::all();

        foreach ($phoneTypes as $index => $phoneType) {
            $phone = $phones[$index] ?? null;

            // if (isset($phone)) {
            //     $this->directoryListing->contactInformation->contactNumbers->update($phoneType, ['phone_number' => $phone]);
            // }

            if (isset($phone)) {
                $contactNumber = $this->directoryListing->contactInformation->contactNumbers()
                                    ->where('phone_type_id', $phoneType->id)
                                    ->first();
        
                if ($contactNumber) {
                    $contactNumber->update(['phone_number' => $phone]);
                }
            }
        }





        // if (collect($this->categories)->count() > 0) {
        //     foreach ($this->categories as $category) {
        //         $this->directoryListing->categories()->detach($category);
        //         $this->directoryListing->categories()->attach($category);
        //     }
        // }

        // if (collect($this->locations)->count() > 0) {
        //     foreach ($this->locations as $location) {
        //         $this->directoryListing->locations()->detach($location);
        //         $this->directoryListing->locations()->attach($location);
        //     }
        // }


        if(isset($this->images)){
        foreach ($this->images as $image) {
            $extension  = $image->getClientOriginalExtension();
            $path = $image->storeAs('images/directoryListing', $this->directoryListing->slug . '-' . rand(100, 999) . '.' . $extension, 'public');

            $imageModel = new Image();
            $imageModel->image = $path;
            $this->directoryListing->images()->save($imageModel);
        }
    }
    if(isset($this->contact_images  )){   
        foreach ($this->contact_images as $contact_image) {
            $extension  = $contact_image->getClientOriginalExtension();
            $path = $contact_image->storeAs('images/directoryListing/contact', $this->directoryListing->slug . '-contact-' . rand(100, 999) . '.' . $extension, 'public');

            $imageModel = new Image();
            $imageModel->image = $path;
            $this->directoryListing->contactInformation->images()->save($imageModel);
        }
    }


        // $extension  = $image->getClientOriginalExtension();
        // $path = $image->storeAs('images/directoryListing',$directoryListing->slug.'-'.rand(100,999).'.'.$extension,'public');

        // $imageModel = new Image();
        // $imageModel->image = $path;
        // $directoryListing->images()->save($imageModel);

        // $this->successMessage = '';
        return redirect()->route('admin.directory-listings.index')->with('success', 'Directory Listing updated successfully. ');
        // $this->directoryListing->load('images');
        // $this->directoryListing->load('content');
        // $this->directoryListing->load('address');
        // $this->directoryListing->contactInformation->load('contact_info_content');
        
            // $this->categories = [];
            // $this->locations = [];
            // $this->title = '';
            // $this->content = '';
            // $this->excerpt = '';
            // $this->is_card_view_featured = [];
            // $this->card = null;
            // $this->is_local_support_view_featured = [];
            // $this->local_support_image = null;
            // $this->is_featured = [];
            // $this->images = null;
            // $this->address  = '';
            // $this->video_url  = '';
            // $this->hide_contact = [];
            // $this->zip_code  = '';
            // $this->fax  = '';
            // $this->email  = '';
            // $this->website = '';
            // $this->contact_excerpt  = '';
            // $this->contact_info_content  = '';
            // $this->contact_images = null;
            // $this->phone  = '';
            // $this->phone_2  = '';
            // $this->phone_3  = '';
            // $this->phone_4  = '';
    }

    public function render()
    {
        // dd($this->categories, $this->selectedDirectoryListingCategories);

        return view('livewire.directory-listings.edit-directory-listing-wire');
    }
}
