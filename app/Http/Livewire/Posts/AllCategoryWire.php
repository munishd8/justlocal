<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Category;

class AllCategoryWire extends Component
{
    public function render()
    {
                 $postCategories = Category::with('parent')->where('menu_id',1)->paginate(5);
        return view('livewire.posts.all-category-wire', [
            'postCategories' => $postCategories,
        ]);
    }
}
