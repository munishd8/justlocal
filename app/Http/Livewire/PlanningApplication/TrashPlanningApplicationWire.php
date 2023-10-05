<?php

namespace App\Http\Livewire\PlanningApplication;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PlanningApplication;

class TrashPlanningApplicationWire extends Component
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
             $this->selected = PlanningApplication::onlyTrashed()->pluck('id')->map(fn ($id) => (string) $id)->toArray();
            
            } else {
             $this->selected = [];
         }
     }
 
     public function performAction()
     {
         if ($this->action === 'restore') {
             $post =  PlanningApplication::whereIn('id', $this->selected)->restore();
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
        PlanningApplication::onlyTrashed()->findOrFail($id)->restore();
    }
    
        public function delete($id)
    {
        PlanningApplication::onlyTrashed()->findOrFail($id)->forceDelete();
    }



        public function deleteSelected(): void 
    {
        $Post = PlanningApplication::onlyTrashed()->whereIn('id', $this->selected)->get();
 
        $Post->each->delete();
 
        $this->reset('selected');
    } 

    public function render()
    {

 $planningApplications = PlanningApplication::onlyTrashed()->paginate(5);
 $planningApplications = PlanningApplication::query()->onlyTrashed();
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $planningApplications->when($column == 'name', fn($planningApplications) => $planningApplications->where('planning_applications.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 
        return view('livewire.planning-application.trash-planning-application-wire',  [
            'planningApplications' => $planningApplications, 
            'planningApplications' => $planningApplications->paginate(10) 
        ]);

    }

}
