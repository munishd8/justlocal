<?php

namespace App\Http\Livewire\Transport;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transport;

class TransportWire extends Component
{

    use WithPagination;
    
    protected $listeners = ['trash', 'deleteSelected'];  

    public $selected = [];
    public $action = '';
    public $selectAll = false;

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = Transport::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'trash') {
            $transports =  Transport::whereIn('id', $this->selected)->get();
            $transports->each->delete();
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
        Transport::findOrFail($id)->delete();
    }

    public function render()
    {

 $transports = Transport::latest('updated_at')->paginate(10);
 $transports = Transport::query()->latest('updated_at');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $transports->when($column == 'name', fn($transports) => $transports->where('transports.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.transport.transport-wire',  [
            'transports' => $transports, 
            'transports' => $transports->paginate(10) 
        ]);
    }

}
