<?php

namespace App\Http\Livewire\DirectoryListings;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditDirectoryListingCategoryWire extends Component
{
    use WithFileUploads;

    public $successMessage = '';
    public $directoryListingCategories;
    public $name;
    public $slug;
    public $parent_category;
    public $description;
    public $image;
    public $img;
    public $category;

    protected $rules = [
        'name' => 'required',
        'description' => 'required|string',
    ];

        protected $messages = [
        'name.required' => 'The Category Name cannot be empty.',
        'parent_category.required' => 'The Parent category cannot be empty',
        'description.required' => 'The Description cannot be empty',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function mount($category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->parent_category = $category->parent_category;
        $this->img = $category->image;
    }

    public function updateCategory()
    {
        $validatedData = $this->validate();

        $image = $this->img;
        
        if ($this->name != $this->category->name) {
           $this->category->slug = null;
        }

        if (($this->parent_category == $this->category->parent_category) || $this->parent_category != null) {
            $this->parent_category = $this->parent_category;
         }else{
            $this->parent_category = $this->category->parent_category;
         }
         
        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
            'parent_category' => $this->parent_category,
        ]);

        if ($this->image) {
            
            $oldUrl =  'upload/'.$this->img;
            if (file_exists($oldUrl)) {
                unlink($oldUrl);
            }
            $extension = $this->image->getClientOriginalExtension();
            $imagePath = $this->image->storeAs('images/categories/directory-lists', $this->category->slug.'.'.$extension, 'public');
            $this->category->image = $imagePath;
            $this->category->save();
            
        }
        $this->successMessage = 'Category updated successfully.';

    }

    public function render()
    {
        return view('livewire.directory-listings.edit-directory-listing-category-wire');
    }
}
