<?php

namespace App\Http\Livewire\DeathNotice;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DeathNotice;

class DeathNoticeWire extends Component
{

    use WithPagination;
    
    protected $listeners = ['trash', 'deleteSelected'];  

    public $selected = [];
    public $action = '';
    public $selectAll = false;

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = DeathNotice::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'trash') {
            $post =  DeathNotice::whereIn('id', $this->selected)->get();
            $post->each->delete();
        }

        $this->selected = []; // Reset the selected array
        $this->action = ''; // Reset the selected action
        $this->selectAll = false;
    }

        public array $searchColumns = [ 
        'title' => '',
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
        DeathNotice::findOrFail($id)->delete();
    }

    public function render()
    {

 $deathNotice = DeathNotice::latest('updated_at')->paginate(5);
 $deathNotice = DeathNotice::query()->latest('updated_at');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $deathNotice->when($column == 'title', fn($deathNotice) => $deathNotice->where('death_notices.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.death-notice.death-notice-wire',  [
            'deathNotice' => $deathNotice, 
            'deathNotice' => $deathNotice->paginate(10) 
        ]);
    }
}
