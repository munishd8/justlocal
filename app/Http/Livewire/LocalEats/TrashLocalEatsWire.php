<?php

namespace App\Http\Livewire\LocalEats;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LocalEat;

class TrashLocalEatsWire extends Component
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
             $this->selected = LocalEat::onlyTrashed()->pluck('id')->map(fn ($id) => (string) $id)->toArray();
            
            } else {
             $this->selected = [];
         }
     }
 
     public function performAction()
     {
         if ($this->action === 'restore') {
             $post =  LocalEat::whereIn('id', $this->selected)->restore();
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
        LocalEat::onlyTrashed()->findOrFail($id)->restore();
    }
    
        public function delete($id)
    {
        LocalEat::onlyTrashed()->findOrFail($id)->forceDelete();
    }



        public function deleteSelected(): void 
    {
        $Post = LocalEat::onlyTrashed()->whereIn('id', $this->selected)->get();
 
        $Post->each->delete();
 
        $this->reset('selected');
    } 

    public function render()
    {

 $localEats = LocalEat::onlyTrashed()->paginate(5);
 $localEats = LocalEat::query()->onlyTrashed();
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $localEats->when($column == 'name', fn($localEats) => $localEats->where('local_eats.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.local-eats.trash-local-eats-wire',  [
            'localEats' => $localEats, 
            'localEats' => $localEats->paginate(10) 
        ]);

    }

}
