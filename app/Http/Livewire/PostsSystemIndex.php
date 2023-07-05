<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class PostsSystemIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::where('role_id',2)->paginate(1);
        return view('livewire.posts.posts-system-index', compact('users'));
    }
}
