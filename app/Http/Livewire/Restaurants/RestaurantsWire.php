<?php

namespace App\Http\Livewire\Restaurants;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Restaurant;

class RestaurantsWire extends Component
{

    use WithPagination;
    
    protected $listeners = ['trash', 'deleteSelected'];  

    public $selected = [];
    public $action = '';
    public $selectAll = false;

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = Restaurant::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'trash') {
            $post =  Restaurant::whereIn('id', $this->selected)->get();
            $post->each->delete();
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
        Restaurant::findOrFail($id)->delete();
    }

    public function render()
    {

 $restaurants = Restaurant::latest('updated_at')->paginate(5);
 $restaurants = Restaurant::query()->latest('updated_at');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $restaurants->when($column == 'name', fn($restaurants) => $restaurants->where('restaurants.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.restaurants.restaurants-wire',  [
            'restaurants' => $restaurants, 
            'restaurants' => $restaurants->paginate(10) 
        ]);
    }
}
