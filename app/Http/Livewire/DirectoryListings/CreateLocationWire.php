<?php

namespace App\Http\Livewire\DirectoryListings;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Location;

class CreateLocationWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $directoryListingLocations;
    public $name;
    public $parent_location;
    public $description;
    public $image;

 
    protected $rules = [
        'name' => 'required',
        'description' => 'required|string',
        'image' => 'image|max:1024|mimes:jpeg,png,jpg',
    ];

        protected $messages = [
        'name.required' => 'The Location  Name cannot be empty.',
        'parent_location.required' => 'The Parent Location cannot be empty',
        'description.required' => 'The Description cannot be empty',
        'image.image' => 'Please Select Image.',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function saveLocation()
    {
        $validatedData = $this->validate();
    
        $location = Location::create($validatedData);
    
        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();
            $imagePath = $this->image->storeAs('images/categories/locations', $location->slug.'.'.$extension, 'public');
            $location->image = $imagePath;
            $location->save();
            $this->emit('locationCreated');
        }
        
        $this->successMessage = 'Location created successfully.';
        $this->name = '';
        $this->parent_location = '';
        $this->description = '';
        $this->image = null;
        $this->emit('locationCreated');
    }
    



    public function render()
    {
        return view('livewire.directory-listings.create-location-wire');
    }
}
