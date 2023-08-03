<?php

namespace App\Http\Livewire\DeathNotice;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DeathNotice;

class TrashDeathNoticeWire extends Component
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
             $this->selected = DeathNotice::onlyTrashed()->pluck('id')->map(fn ($id) => (string) $id)->toArray();
            
            } else {
             $this->selected = [];
         }
     }
 
     public function performAction()
     {
         if ($this->action === 'restore') {
             $post =  DeathNotice::whereIn('id', $this->selected)->restore();
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
       DeathNotice::onlyTrashed()->findOrFail($id)->restore();
    }
    
        public function delete($id)
    {
        DeathNotice::onlyTrashed()->findOrFail($id)->forceDelete();
    }



        public function deleteSelected(): void 
    {
        $Post = DeathNotice::onlyTrashed()->whereIn('id', $this->selected)->get();
 
        $Post->each->delete();
 
        $this->reset('selected');
    } 

    public function render()
    {

 $deathNotice = DeathNotice::onlyTrashed()->paginate(5);
 $deathNotice = DeathNotice::query()->onlyTrashed();
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $deathNotice->when($column == 'title', fn($deathNotice) => $deathNotice->where('death_notices.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.death-notice.trash-death-notice-wire',  [
            'deathNotice' => $deathNotice, 
            'deathNotice' => $deathNotice->paginate(10) 
        ]);

    }


}
