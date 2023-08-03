<?php

namespace App\Http\Livewire\Transport;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transport;

class TrashTransportWire extends Component
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
             $this->selected = Transport::onlyTrashed()->pluck('id')->map(fn ($id) => (string) $id)->toArray();
            
            } else {
             $this->selected = [];
         }
     }
 
     public function performAction()
     {
         if ($this->action === 'restore') {
             $transports =  Transport::whereIn('id', $this->selected)->restore();
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
        Transport::onlyTrashed()->findOrFail($id)->restore();
    }
    
        public function delete($id)
    {
        Transport::onlyTrashed()->findOrFail($id)->forceDelete();
    }



        public function deleteSelected(): void 
    {
        $transports = Transport::onlyTrashed()->whereIn('id', $this->selected)->get();
 
        $transports->each->delete();
 
        $this->reset('selected');
    } 

    public function render()
    {

 $transports = Transport::onlyTrashed()->paginate(5);
 $transports = Transport::query()->onlyTrashed();
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $transports->when($column == 'name', fn($transports) => $transports->where('transports.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.transport.trash-transport-wire',  [
            'transports' => $transports, 
            'transports' => $transports->paginate(10) 
        ]);

    }
}
