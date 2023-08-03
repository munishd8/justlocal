<?php

namespace App\Http\Livewire\LocalEats;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LocalEat;
use App\Models\Image;

class CreateLocalEatWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $name;
    public $description;
    public $link;
    public $image;

    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
        'image' => 'required|max:2048',
        'link' => 'required|string',
    ];

        protected $messages = [
            'name.required' => 'The Name cannot be empty.',
            'description.required' => 'The Description cannot be empty.',
            'link.required' => 'The Please Enter Valid Link.',
    ];

        public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveLocalEat()
    {
        $validatedData = $this->validate();
       $localEat =  LocalEat::create($validatedData);


      
                $extension  = $this->image->getClientOriginalExtension();
        $path = $this->image->storeAs('images/localEats/',$localEat->slug.'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $localEat->images()->save($imageModel);



    $this->successMessage = 'Local Eat created successfully.';
    $this->name = '';
    $this->description = '';
    $this->link = '';
    $this->image = null;
    }


    public function render()
    {
        return view('livewire.local-eats.create-local-eat-wire');
    }
}
