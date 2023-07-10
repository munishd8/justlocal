<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Category;

class TrashPostsWire extends Component
{
     use WithPagination;
    
    public array $categories = [];
    
    protected $listeners = ['delete', 'deleteSelected','restore','restoreSelected'];  

     public array $selected = []; 

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

            public function restoreConfirm($method, $id = null)
    {
        $this->dispatchBrowserEvent('swal:restore-confirm', [
            'type'   => 'warning',
            'title'  => 'Are you sure?',
            'text'   => '',
            'id'     => $id,
            'method' => $method,
        ]);
    }

            public function restore($id)
    {
       // dd($id);
        Post::onlyTrashed()->findOrFail($id)->restore();
    }
    
        public function delete($id)
    {
       // dd($id);
        Post::onlyTrashed()->findOrFail($id)->forceDelete();
    }



        public function deleteSelected(): void 
    {
        $Post = Post::onlyTrashed()->whereIn('id', $this->selected)->get();
 
        $Post->each->delete();
 
        $this->reset('selected');
    } 

    public function render()
    {

 $posts = Post::onlyTrashed()->paginate(5);
 $posts = Post::query()->onlyTrashed()->with('categories');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $posts->when($column == 'category_id', fn($posts) => $posts->whereRelation('categories', 'id', $value))
                ->when($column == 'title', fn($posts) => $posts->where('posts.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.posts.trash-posts-wire',  [
            'posts' => $posts, 
            'posts' => $posts->paginate(10) 
        ]);

    }

}
