<?php

namespace App\Http\Livewire\DirectoryListings;

use App\Models\DirectoryListing;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;
use App\Models\PhoneType;

class CreateDirectoryListingWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $directoryListingCategories;
    public $directoryListingLocations;
    public $categories = [];
    public $locations = [];
    public $title;
    public $content;
    public $excerpt;
    public $is_card_view_featured;
    public $card;
    public $is_local_support_view_featured;
    public $local_support_image;
    public $is_featured;
    public $images;
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
    public $phone;
    public $phone_2;
    public $phone_3;
    public $phone_4;
    

    protected $rules = [
        'title' => 'required',
        'content' => 'required|string',
        'images' => 'required|max:2048',
        'address' => 'required|string|max:255',
        'video_url' => 'required|string|max:255',
        'zip_code' => 'required|string|max:255',
        'fax' => 'required|string|max:255',
        'email' => 'required|string|email',
        'website' => 'required|string|max:255',
        'contact_excerpt' => 'required|string',
        'contact_info_content' => 'required|string',
        'contact_images' => 'required|max:2048',
        'phone' => 'required',
        
    ];

        protected $messages = [
        'title.required' => 'The Directory Listing cannot be empty.',
        'content.required' => 'The Directory Listing Content cannot be empty',
        'images' => 'Please Select atleast One Image.',
        'items.required' => 'The No of Items cannot be empty',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();
        $validatedData['menu_id'] = 3;

        if($this->is_card_view_featured == 1 && isset($this->card)){
            $extension  = $this->card->getClientOriginalExtension();
            $path_card = $this->card->storeAs('images/directoryListing/card',$this->title.'-'.rand(100,999).'.'.$extension,'public');
        }
        $path_card = (isset($path_card))? $path_card : NULL;
        $this->is_local_support_view_featured = ($this->is_local_support_view_featured==1)? 1 : 0;

        if($this->is_local_support_view_featured == 1 && isset($this->local_support_image)){
            $extension  = $this->card->getClientOriginalExtension();
            $local_support = $this->card->storeAs('images/directoryListing/localSupport',$this->title.'-'.rand(100,999).'.'.$extension,'public');
        }
        $local_support = (isset($local_support))? $local_support : NULL;
        $this->is_local_support_view_featured = ($this->is_local_support_view_featured==1)? 1 : 0;
       $directoryListing =  DirectoryListing::create($validatedData + ['excerpt'=>$this->excerpt,'is_card_view_featured' => $this->is_card_view_featured,'card' => $path_card,'is_local_support_view_featured'=> $this->is_local_support_view_featured,'local_support_image'=> $local_support, 'excerpt'=> $this->excerpt]);
    
       $this->hide_contact = ($this->hide_contact==1)? 1 : 0;
       $contact =  $directoryListing->contactInformation()->create([
            'directory_listing_id' => $directoryListing->id,
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
    
    if (isset($phone)) {
        $contact->contactNumbers()->attach($phoneType, ['phone_number' => $phone]);
    }
}



        

       if(collect($this->categories)->count() > 0){
               foreach($this->categories as $category){
        $directoryListing->categories()->attach($category);
       }
       }

       if(collect($this->locations)->count() > 0){
        foreach($this->locations as $location){
    $directoryListing->locations()->attach($location);
}
}

       

       foreach ($this->images as $image) {
                $extension  = $image->getClientOriginalExtension();
        $path = $image->storeAs('images/directoryListing',$directoryListing->slug.'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $directoryListing->images()->save($imageModel);

}

foreach ($this->contact_images as $contact_image) {
    $extension  = $contact_image->getClientOriginalExtension();
$path = $contact_image->storeAs('images/directoryListing/contact',$directoryListing->slug.'-contact-'.rand(100,999).'.'.$extension,'public');

$imageModel = new Image();
$imageModel->image = $path;
$contact->images()->save($imageModel);

}



// $extension  = $image->getClientOriginalExtension();
// $path = $image->storeAs('images/directoryListing',$directoryListing->slug.'-'.rand(100,999).'.'.$extension,'public');

// $imageModel = new Image();
// $imageModel->image = $path;
// $directoryListing->images()->save($imageModel);

     $this->successMessage = 'Directory Listing created successfully.';
     $this->categories = [];
     $this->locations = [];
     $this->title = '';
     $this->content = '';
     $this->excerpt = '';
     $this->is_card_view_featured = [];
     $this->card = null;
     $this->is_local_support_view_featured = [];
     $this->local_support_image = null;
     $this->is_featured = [];
     $this->images = null;
     $this->address  = '';
     $this->video_url  = '';
     $this->hide_contact = [];
     $this->zip_code  = '';
     $this->fax  = '';
     $this->email  = '';
     $this->website = '';
     $this->contact_excerpt  = '';
     $this->contact_info_content  = '';
     $this->contact_images = null;
     $this->phone  = '';
     $this->phone_2  = '';
     $this->phone_3  = '';
     $this->phone_4  = '';
    }

    public function render()
    {
        return view('livewire.directory-listings.create-directory-listing-wire');
    }
}
