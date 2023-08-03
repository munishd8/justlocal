<?php

namespace App\Http\Livewire\Restaurants;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Restaurant;

class TrashRestaurantWire extends Component
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
             $this->selected = Restaurant::onlyTrashed()->pluck('id')->map(fn ($id) => (string) $id)->toArray();
            
            } else {
             $this->selected = [];
         }
     }
 
     public function performAction()
     {
         if ($this->action === 'restore') {
             $restaurants =  Restaurant::whereIn('id', $this->selected)->restore();
         }
 
         $this->selected = []; // Reset the selected array
         $this->action = ''; // Reset the selected action
         $this->selectAll = false;
     }

        public array $searchColumns = [ 
        'name' => '',
    ]; 


    protected $paginationTheme = 'bootstrap';
    
    public function mount()
    {
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
        Restaurant::onlyTrashed()->findOrFail($id)->restore();
    }
    
        public function delete($id)
    {
        Restaurant::onlyTrashed()->findOrFail($id)->forceDelete();
    }



        public function deleteSelected(): void 
    {
        $restaurants = Restaurant::onlyTrashed()->whereIn('id', $this->selected)->get();
 
        $restaurants->each->delete();
 
        $this->reset('selected');
    } 

    public function render()
    {

 $restaurants = Restaurant::onlyTrashed()->paginate(5);
 $restaurants = Restaurant::query()->onlyTrashed();
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $restaurants->when($column == 'name', fn($restaurants) => $restaurants->where('restaurants.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.restaurants.trash-restaurant-wire',  [
            'restaurants' => $restaurants, 
            'restaurants' => $restaurants->paginate(10) 
        ]);

    }

}
