<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;

class EditPostWire extends Component
{

    public $successMessage = '';
    public $postCategories;
    public $categories = [];
    public $title;
    public $content;
    public $excerpt;
    public $is_featured;
    public $images;

    public function render()
    {
        return view('livewire.posts.edit-post-wire');
    }
}
