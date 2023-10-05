<?php

namespace App\Http\Livewire\Comments;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Comment;

class CommentsWire extends Component
{
    use WithPagination;

    // public array $categories = [];
    // public $comments;
    
    protected $listeners = ['delete', 'deleteSelected'];  

    public $selected = [];
    public $action = '';
    public $selectAll = false;

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = Post::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'delete') {
            $comment =  Comment::whereIn('id', $this->selected)->get();
            $comment->each->delete();
        }

        if ($this->action === 'activate') {
            $comment =  Comment::whereIn('id', $this->selected)->get();
            $comment->each->update(['status' => 1]);
        }


        if ($this->action === 'deActivate') {
            $comment =  Comment::whereIn('id', $this->selected)->get();
            $comment->each->update(['status' => 0]);
        }

        $this->selected = []; // Reset the selected array
        $this->action = ''; // Reset the selected action
        $this->selectAll = false;
    }

    //     public array $searchColumns = [ 
    //     'title' => '',
    //     'category_id' => 0,
    // ]; 


    protected $paginationTheme = 'bootstrap';
    
    public function mount()
    {

        
        
        // $this->categories = Category::where('menu_id',1)->pluck('name', 'id')->toArray();
        // $this->searchQuery = '';
        // $this->searchCategory = '';
    }

        public function getSelectedCountProperty(): int 
    {
        return count($this->selected);
    } 

    public function deleteConfirm($method, $id = null)
    {
        $this->dispatchBrowserEvent('swal:delete-confirm', [
            'type'   => 'warning',
            'title'  => 'Are you sure?',
            'text'   => '',
            'id'     => $id,
            'method' => $method,
        ]);
    }

    public function delete($id)
    {
        Comment::findOrFail($id)->forceDelete();
    }

    public function changeStatus($id)
{
    // dd($id);
    $comment = Comment::find($id);
    $status = ($comment->status == 0)? 1: 0;
    $comment->update(['status' => $status]);
}

    public function render()
    {
        $comments = Comment::with('commentable')->latest();

        return view('livewire.comments.comments-wire',  [
            'comments' => $comments,
            'comments' => $comments->paginate(10) 
        ]);
    }
}
