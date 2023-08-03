<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;

class PostsWire extends Component
{
    use WithPagination;
    
    public array $categories = [];
    
    protected $listeners = ['trash', 'deleteSelected'];  

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
        if ($this->action === 'trash') {
            $post =  Post::whereIn('id', $this->selected)->get();
            $post->each->delete();
        }

        $this->selected = []; // Reset the selected array
        $this->action = ''; // Reset the selected action
        $this->selectAll = false;
    }

        public array $searchColumns = [ 
        'title' => '',
        'category_id' => 0,
    ]; 


    protected $paginationTheme = 'bootstrap';
    
    public function mount()
    {
        $this->categories = Category::where('menu_id',1)->pluck('name', 'id')->toArray();
        $this->searchQuery = '';
        $this->searchCategory = '';
    }

        public function getSelectedCountProperty(): int 
    {
        return count($this->selected);
    } 

        public function trashConfirm($method, $id = null)
    {
        $this->dispatchBrowserEvent('swal:trash-confirm', [
            'type'   => 'warning',
            'title'  => 'Are you sure?',
            'text'   => '',
            'id'     => $id,
            'method' => $method,
        ]);
    }

        public function trash($id)
    {
        Post::findOrFail($id)->delete();
    }

    public function render()
    {

 $posts = Post::latest('updated_at')->paginate(5);
 $posts = Post::query()->with('categories')->latest('updated_at');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $posts->when($column == 'category_id', fn($posts) => $posts->whereRelation('categories', 'id', $value))
                ->when($column == 'title', fn($posts) => $posts->where('posts.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.posts.posts-wire',  [
            'posts' => $posts, 
            'posts' => $posts->paginate(10) 
        ]);
    }
}
