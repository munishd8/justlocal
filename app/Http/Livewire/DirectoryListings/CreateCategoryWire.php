<?php

namespace App\Http\Livewire\DirectoryListings;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;

class CreateCategoryWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $directoryListingCategories;
    public $name;
    public $parent_category;
    public $description;
    public $image;

 
    protected $rules = [
        'name' => 'required',
        'description' => 'required|string',
        'image' => 'image|max:1024|mimes:jpeg,png,jpg',
    ];

        protected $messages = [
        'name.required' => 'The Category Name cannot be empty.',
        'parent_category.required' => 'The Parent category cannot be empty',
        'description.required' => 'The Description cannot be empty',
        'image.image' => 'Please Select Image.',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function saveCategory()
    {
        $validatedData = $this->validate();
        $validatedData['menu_id'] = 3;
    
        $category = Category::create($validatedData);
    
        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();
            $imagePath = $this->image->storeAs('images/categories/directory-lists', $category->slug.'.'.$extension, 'public');
            $category->image = $imagePath;
            $category->save();
            $this->emit('categoryCreated');
        }
        
        $this->successMessage = 'Category created successfully.';
        $this->name = '';
        $this->parent_category = '';
        $this->description = '';
        $this->image = null;
        $this->emit('categoryCreated');
    }
    



    public function render()
    {
        return view('livewire.directory-listings.create-category-wire');
    }
}
