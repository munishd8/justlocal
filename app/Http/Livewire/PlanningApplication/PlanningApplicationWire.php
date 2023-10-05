<?php

namespace App\Http\Livewire\PlanningApplication;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PlanningApplication;

class PlanningApplicationWire extends Component
{
    use WithPagination;
    
    protected $listeners = ['trash', 'deleteSelected'];  

    public $selected = [];
    public $action = '';
    public $selectAll = false;

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = PlanningApplication::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'trash') {
            $post =  PlanningApplication::whereIn('id', $this->selected)->get();
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
        PlanningApplication::findOrFail($id)->delete();
    }

    public function render()
    {

 $planningApplications = PlanningApplication::latest('updated_at')->paginate(5);
 $planningApplications = PlanningApplication::query()->latest('updated_at');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $planningApplications->when($column == 'name', fn($planningApplications) => $planningApplications->where('planning_applications.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
        return view('livewire.planning-application.planning-application-wire',  [
            'planningApplications' => $planningApplications, 
            'planningApplications' => $planningApplications->paginate(10) 
        ]);

    }

}
