<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;

class CreateCategoryWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $postCategories;
    public $name;
    public $parent_category;
    public $description;
    public $image;

 
    protected $rules = [
        'name' => 'required',
        'parent_category' => 'required|integer',
        'description' => 'required|string',
        'image' => 'image|max:1024',
    ];

        protected $messages = [
        'name.required' => 'The Category Name cannot be empty.',
        'parent_category.required' => 'The Parent category cannot be empty',
        'description.required' => 'The Description cannot be empty',
        'image.image' => 'Upload Image.'
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function saveCategory()
    {

        $validatedData = $this->validate();
        $validatedData['menu_id'] = 1;
        $this->image->store('images');
 
        Category::create($validatedData);
        $this->successMessage = 'Category created successfully.';
    $this->name = '';
     $this->parent_category = '';
    $this->description = '';
    $this->description = '';
    }



    public function render()
    {
        return view('livewire.posts.create-category-wire');
    }
}
