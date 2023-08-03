<?php

namespace App\Http\Livewire\DirectoryListings;

use Livewire\Component;
use App\Models\DirectoryListing;
use App\Models\Category;
use Livewire\WithPagination;

class DirectoryListingsWire extends Component
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
            $this->selected = DirectoryListing::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'trash') {
            $post =  DirectoryListing::whereIn('id', $this->selected)->get();
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
        $this->categories = Category::where('menu_id',3)->pluck('name', 'id')->toArray();
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
        DirectoryListing::findOrFail($id)->delete();
    }

    public function render()
    {

 $directoryListings = DirectoryListing::latest('updated_at')->paginate(5);
 $directoryListings = DirectoryListing::query()->with(['categories','locations'])->latest('updated_at');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $directoryListings->when($column == 'category_id', fn($directoryListings) => $directoryListings->whereRelation('categories', 'id', $value))
                ->when($column == 'title', fn($directoryListings) => $directoryListings->where('directory_listings.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.directory-listings.directory-listings-wire',  [
            'directoryListings' => $directoryListings, 
            'directoryListings' => $directoryListings->paginate(10) 
        ]);
    }


}
