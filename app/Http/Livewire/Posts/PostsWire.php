<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostsWire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
         $posts = Post::with('categories')
            ->paginate(10);
        return view('livewire.posts.posts-wire', [
            'posts' => $posts,
        ]);
    }
}
