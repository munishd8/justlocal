<?php

namespace App\Http\Livewire\LocalEats;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LocalEat;

class LocalEatsWire extends Component
{

    use WithPagination;
    
    protected $listeners = ['trash', 'deleteSelected'];  

    public $selected = [];
    public $action = '';
    public $selectAll = false;

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = LocalEat::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'trash') {
            $post =  LocalEat::whereIn('id', $this->selected)->get();
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
        LocalEat::findOrFail($id)->delete();
    }

    public function render()
    {

 $localEats = LocalEat::latest('updated_at')->paginate(5);
 $localEats = LocalEat::query()->latest('updated_at');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $localEats->when($column == 'name', fn($localEats) => $localEats->where('local_eats.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.local-eats.local-eats-wire',  [
            'localEats' => $localEats, 
            'localEats' => $localEats->paginate(10) 
        ]);
    }


}
