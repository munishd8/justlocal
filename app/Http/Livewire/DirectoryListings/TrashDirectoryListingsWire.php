<?php

namespace App\Http\Livewire\DirectoryListings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DirectoryListing;
use App\Models\Category;

class TrashDirectoryListingsWire extends Component
{
    use WithPagination;
    
    public array $categories = [];
    
    protected $listeners = ['delete', 'deleteSelected','restore','restoreSelected'];  


     public $selected = [];
     public $action = '';
     public $selectAll = false;

     public function toggleSelectAll()
     {
         if ($this->selectAll) {
             $this->selected = DirectoryListing::onlyTrashed()->pluck('id')->map(fn ($id) => (string) $id)->toArray();
            
            } else {
             $this->selected = [];
         }
     }
 
     public function performAction()
     {
         if ($this->action === 'restore') {
             $directoryListing =  DirectoryListing::whereIn('id', $this->selected)->restore();
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
       DirectoryListing::onlyTrashed()->findOrFail($id)->restore();
    }
    
        public function delete($id)
    {
        DirectoryListing::onlyTrashed()->findOrFail($id)->forceDelete();
    }



        public function deleteSelected(): void 
    {
        $directoryListing = DirectoryListing::onlyTrashed()->whereIn('id', $this->selected)->get();
 
        $directoryListing->each->delete();
 
        $this->reset('selected');
    } 

    public function render()
    {

 $directoryListings = DirectoryListing::onlyTrashed()->paginate(5);
 $directoryListings = DirectoryListing::query()->onlyTrashed()->with('categories');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $directoryListings->when($column == 'category_id', fn($directoryListings) => $directoryListings->whereRelation('categories', 'id', $value))
                ->when($column == 'title', fn($directoryListings) => $directoryListings->where('directory_listings.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.directory-listings.trash-directory-listings-wire',  [
            'directoryListings' => $directoryListings, 
            'directoryListings' => $directoryListings->paginate(10) 
        ]);

    }
}
