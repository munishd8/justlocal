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
        'description' => 'required|string',
        'image' => 'image|max:1024|mimes:jpeg,png,jpg',
    ];

        protected $messages = [
        'name.required' => 'The Category Name cannot be empty.',
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
        $validatedData['menu_id'] = 1;

        $this->parent_category = (empty($this->parent_category)) ? NULL : $this->parent_category;
    
        $category = Category::create($validatedData + ['parent_category' => $this->parent_category]);
    
        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();
            $imagePath = $this->image->storeAs('upload/images/categories/posts', $category->slug.'.'.$extension, 'public');
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
        return view('livewire.posts.create-category-wire');
    }
}
