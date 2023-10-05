<?php

namespace App\Http\Livewire\LocalEats;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LocalEat;
use App\Models\Image;

class EditLocalEatWire extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $link;
    public $image;
    public $img;
    public $localEat;

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


    public function mount($localEat)
    {
        $this->localEat = $localEat;
        $this->name = $this->localEat->name;
        $this->description = $this->localEat->description;
        $this->link = $this->localEat->link;

        $this->img = $this->localEat->images[0]['image'];
    }


    public function editLocalEat()
    {
        $validatedData = $this->validate();

        $image = $this->img;

        $this->localEat->update($validatedData);

        if ($this->image) {
            $this->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);

            $oldUrl =  'upload/' . $this->img;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $extension  = $this->image->getClientOriginalExtension();
            $path = $this->image->storeAs('images/localEats', $this->localEat->name . '-' . rand(100, 999) . '.' . $extension, 'public');

            $imageModel = new Image();
            $imageModel->image = $path;
            $this->localEat->images()->delete();
            $this->localEat->images()->save($imageModel);
        }
        return redirect()->route('admin.local-eats.index')->with('success', 'Local Eat updated successfully.');
    }

    public function render()
    {
        return view('livewire.local-eats.edit-local-eat-wire');
    }
}
