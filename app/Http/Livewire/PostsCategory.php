<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class PostsCategory extends Component
{
     use WithPagination;

     public $name;

    public function render()
    {
               $postCategories = Category::with('parent')->where('menu_id',1)->paginate(2);

                       $parents = $postCategories->map(function ($category) {
        return $category->parent;
    })->unique();

        return view('livewire.posts.category', compact('postCategories','parents'));
    }
}
