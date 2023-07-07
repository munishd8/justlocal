<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryWire extends Component
{
        use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
         $postCategories = Category::with('parent')->where('menu_id',1)->paginate(5);
            return view('livewire.posts.category-wire', [
            'postCategories' => $postCategories,
        ]);
    }

    
}
