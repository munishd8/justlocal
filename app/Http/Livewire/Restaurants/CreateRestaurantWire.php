<?php

namespace App\Http\Livewire\Restaurants;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Restaurant;
use App\Models\Image;


class CreateRestaurantWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $name;
    public $address;
    public $phone;
    public $email;
    public $website;
    public $image;

    protected $rules = [
        'name' => 'required|string',
        'address' => 'required|string',
        'image' => 'required|max:2048',
        'phone' => 'required|string',
        'email' => 'required|string|email',
        'website' => 'required|string',
    ];

        protected $messages = [
        'name.required' => 'The Name cannot be empty.',
        'address.required' => 'The Address cannot be empty',
        'phone.required' => 'The Phone cannot be empty',
        'email.required' => 'The Email cannot be empty',
        'website.required' => 'Please Enter Valid  Website Url.',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveRestaurant()
    {
        // dd(12344);
        // return $this->validate();
        $validatedData = $this->validate();
        // dd($validatedData);
       $restaurant =  Restaurant::create($validatedData);


      
                $extension  = $this->image->getClientOriginalExtension();
        $path = $this->image->storeAs('images/restaurants/',$restaurant->slug.'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $restaurant->images()->save($imageModel);



    $this->successMessage = 'Restaurant created successfully.';
    $this->name = '';
    $this->address = '';
    $this->phone = '';
    $this->email = '';
    $this->website = '';
    $this->image = null;
    }

    public function render()
    {
        return view('livewire.restaurants.create-restaurant-wire');
    }
}
