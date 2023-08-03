<?php

namespace App\Http\Livewire\DirectoryListings;

use Livewire\Component;
use App\Models\Location;
use Livewire\WithPagination;

class LocationWire extends Component
{
        use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['locationCreated' => 'refreshLocation','trash', 'deleteSelected'];

    public $selected = [];
    public $action = '';
    public $selectAll = false;

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = Location::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'trash') {
            $directoryListing =  Location::whereIn('id', $this->selected)->get();
            $directoryListing->each->delete();
        }

        $this->selected = []; // Reset the selected array
        $this->action = ''; // Reset the selected action
        $this->selectAll = false;
    }


    public array $searchColumns = [ 
        'name' => '',
    ]; 

    public function refreshLocation()
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
        Location::findOrFail($id)->delete();
    }

    
    public function render()
    {
      

        $directoryListingLocations = Location::latest('updated_at')->paginate(5);
        $directoryListingLocations = Location::query()->latest('updated_at');
        
               foreach ($this->searchColumns as $column => $value) {
                   if (!empty($value)) {
                   $directoryListingLocations->when($column == 'name', fn($directoryListingLocations) => $directoryListingLocations->where('locations.' . $column, 'LIKE', '%' . $value . '%'));
                   }
               } 
        
               return view('livewire.directory-listings.location-wire',  [
                   'directoryListingLocations' => $directoryListingLocations, 
                   'directoryListingLocations' => $directoryListingLocations->paginate(5) 
               ]);
    }

    
}
