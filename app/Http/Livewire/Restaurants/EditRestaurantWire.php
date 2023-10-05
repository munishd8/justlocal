<?php

namespace App\Http\Livewire\Restaurants;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Restaurant;
use App\Models\Image;
use Carbon\Carbon;

class EditRestaurantWire extends Component
{
    use WithFileUploads;

    public $name;
    public $address;
    public $restaurantCategories;
    public $categories = [];
    public $parent_category;
    public $phone;
    public $email;
    public $website;
    public $restaurant;
    public $img;
    public $image;

    protected $rules = [
        'name' => 'required|string',
        'address' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'phone' => 'required|string',
        'email' => 'required|string|email',
        'website' => 'required|string',
    ];

        protected $messages = [
        'name.required' => 'The Name cannot be empty.',
        'address.required' => 'The Address cannot be empty.',
        'phone.required' => 'The Phone cannot be empty.',
        'email.required' => 'The Email cannot be empty.',
        'website.required' => 'The Website cannot be empty.',
        'image.image' => 'The uploaded file must be an image.',
        'image.mimes' => 'The image must be in JPEG, PNG, JPG, or GIF format.',
        'image.max' => 'The image size must not exceed 2MB.',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;
        $this->name = $this->restaurant->name;
        $this->address = $this->restaurant->address;
        $this->phone = $this->restaurant->phone;
        $this->email = $this->restaurant->email;
        $this->website = $this->restaurant->website;
        $this->img = $this->restaurant->images[0]['image'];
        $this->parent_category = $this->restaurant->categories->pluck('id')->toArray();
        $this->categories = $this->parent_category;
        // dd($this->img);
    }

    public function updateRestaurant()
    {
        $validatedData = $this->validate();

        $image = $this->img;
        
        $this->restaurant->update($validatedData);
        $this->restaurant->categories()->sync($this->categories);

        if ($this->image) {
           $this->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']); // Add image validation
           
            $oldUrl =  'upload/'.$this->img;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $extension  = $this->image->getClientOriginalExtension();
        $path = $this->image->storeAs('images/restaurants',str_replace(' ', '-', $this->restaurant->name).'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $this->restaurant->images()->delete();
    $this->restaurant->images()->save($imageModel);
            
        }
        return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant updated successfully.');

    }

    public function render()
    {
        return view('livewire.restaurants.edit-restaurant-wire');
    }
}
