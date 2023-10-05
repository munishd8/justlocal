<?php

namespace App\Http\Livewire\Transport;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Transport;
use App\Models\Image;


class CreateTransportWire extends Component
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

    public function saveTransport()
    {
        $validatedData = $this->validate();
       $transport =  Transport::create($validatedData);


      
                $extension  = $this->image->getClientOriginalExtension();
        $path = $this->image->storeAs('images/transports/',$transport->slug.'-'.rand(100,999).'.'.$extension,'public');

    $imageModel = new Image();
    $imageModel->image = $path;
    $transport->images()->save($imageModel);



    $this->successMessage = 'Transport created successfully.';
    $this->name = '';
    $this->description = '';
    $this->link = '';
    $this->image = null;
    }

    public function render()
    {
        return view('livewire.transport.create-transport-wire');
    }
}
