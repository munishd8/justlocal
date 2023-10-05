<?php

namespace App\Http\Livewire\Subscribers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class SubscriberWire extends Component
{

    use WithPagination;
    
    protected $listeners = ['trash', 'deleteSelected'];  

    public $selected = [];
    public $action = '';
    public $selectAll = false;
    public $isChecked = false;


    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = User::pluck('id')->map(fn ($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function performAction()
    {
        if ($this->action === 'block_users') {
            $user =  User::whereIn('id', $this->selected)->get();
            $user->each->update(['status' => 0]);
        }

        if ($this->action === 'unblock_users') {
            $user =  User::whereIn('id', $this->selected)->get();
            $user->each->update(['status' => 1]);
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
        User::findOrFail($id)->delete();
    }

    public function toggleCheckbox($id)
    {
        dd($id);
        // Toggle the checkbox state
        $this->isChecked = !$this->isChecked;

        // Perform any other actions you need
        if ($this->isChecked) {
            dd(1);
            // Checkbox is checked, do something
        } else {
            dd(2);
            // Checkbox is unchecked, do something else
        }
    }

    public function render()
    {

 $subscribers = User::where('role_id',2)->latest('updated_at')->paginate(5);
 $subscribers = User::query()->where('role_id',2)->latest('updated_at');
 
        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
            $subscribers->when($column == 'name', fn($subscribers) => $subscribers->where('users.' . $column, 'LIKE', '%' . $value . '%'));
            }
        } 
 

        return view('livewire.subscribers.subscriber-wire',  [
            'subscribers' => $subscribers, 
            'subscribers' => $subscribers->paginate(10) 
        ]);
    }


}
