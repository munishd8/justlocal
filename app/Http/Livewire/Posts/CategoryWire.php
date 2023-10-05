<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryWire extends Component
{
        use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['categoryCreated' => 'refreshCategories','trash', 'deleteSelected'];

    public $selected = [];
    public $action = '';
    public $selectAll = false;

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = Category::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'trash') {
            $post =  Category::whereIn('id', $this->selected)->get();
            $post->each->delete();
        }

        $this->selected = []; // Reset the selected array
        $this->action = ''; // Reset the selected action
        $this->selectAll = false;
    }


    public array $searchColumns = [ 
        'name' => '',
    ]; 

    public function refreshCategories()
    {
        $this->resetPage(); // Reset the pagination to the first page
    }


    // public function mount()
    // {
    //     $this->categories = Category::where('menu_id',1)->pluck('name', 'id')->toArray();
    //     $this->searchQuery = '';
    //     $this->searchCategory = '';
    // }

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
        Category::findOrFail($id)->delete();
    }

    
    public function render()
    {
       

        $postCategories = Category::where('menu_id',1)->latest('updated_at')->paginate(5);
        $postCategories = Category::query()->where('menu_id',1)->latest('updated_at');
        
               foreach ($this->searchColumns as $column => $value) {
                   if (!empty($value)) {
                   $postCategories->when($column == 'name', fn($postCategories) => $postCategories->where('categories.' . $column, 'LIKE', '%' . $value . '%'));
                   }
               } 
        
               return view('livewire.posts.category-wire',  [
                   'postCategories' => $postCategories, 
                   'postCategories' => $postCategories->paginate(5) 
               ]);
    }

    
}
