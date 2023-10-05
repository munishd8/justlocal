<?php

namespace App\Http\Livewire\Transport;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LocalEat;
use App\Models\Image;

class EditTransportWire extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $link;
    public $image;
    public $img;
    public $transport;

    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
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


    public function mount($transport)
    {
        $this->transport = $transport;
        $this->name = $this->transport->name;
        $this->description = $this->transport->description;
        $this->link = $this->transport->link;

        $this->img = $this->transport->images[0]['image'];
    }


    public function editTransport()
    {
        $validatedData = $this->validate();

        $image = $this->img;

        $this->transport->update($validatedData);

        if ($this->image) {
            $this->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);

            $oldUrl =  'upload/' . $this->img;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $extension  = $this->image->getClientOriginalExtension();
            $path = $this->image->storeAs('images/transports', $this->transport->name . '-' . rand(100, 999) . '.' . $extension, 'public');

            $imageModel = new Image();
            $imageModel->image = $path;
            $this->transport->images()->delete();
            $this->transport->images()->save($imageModel);
        }
        return redirect()->route('admin.transports.index')->with('success', 'Transport  updated successfully.');
    }


    public function render()
    {
        return view('livewire.transport.edit-transport-wire');
    }
}
