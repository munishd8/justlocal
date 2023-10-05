<?php

namespace App\Http\Livewire\DirectoryListings;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditDirectoryListingLocationWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $directoryListingLocations;
    public $name;
    public $slug;
    public $parent_location;
    public $description;
    public $image;
    public $img;
    public $location;

    protected $rules = [
        'name' => 'required',
        'description' => 'required|string',
    ];

        protected $messages = [
        'name.required' => 'The Location Name cannot be empty.',
        'parent_category.required' => 'The Parent Location cannot be empty',
        'description.required' => 'The Description cannot be empty',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function mount($location)
    {
        $this->location = $location;
        $this->name = $location->name;
        $this->description = $location->description;
        $this->parent_location = $location->parent_location;
        $this->img = $location->image;
    }

    public function updateLocation()
    {
        $validatedData = $this->validate();

        $image = $this->img;
        
        if ($this->name != $this->location->name) {
           $this->location->slug = null;
        }

        if (($this->parent_location == $this->location->parent_location) || $this->parent_location != null) {
            $this->parent_location = $this->parent_location;
         }else{
            $this->parent_location = $this->location->parent_location;
         }
         
        $this->location->update([
            'name' => $this->name,
            'description' => $this->description,
            'parent_location' => $this->parent_location,
        ]);

        if ($this->image) {
            
            $oldUrl =  'upload/'.$this->img;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $extension = $this->image->getClientOriginalExtension();
            $imagePath = $this->image->storeAs('images/categories/locations', $this->location->slug.'.'.$extension, 'public');
            $this->location->image = $imagePath;
            $this->location->save();
            
        }
        $this->successMessage = 'Location updated successfully.';

    }

    public function render()
    {
        return view('livewire.directory-listings.edit-directory-listing-location-wire');
    }
}
