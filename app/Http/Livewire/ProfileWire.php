<?php

namespace App\Http\Livewire;
use Livewire\Component;

class ProfileWire extends Component
{
        public $name;
        public $email;

        protected $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
        ];
    
        protected $messages = [
            'name.required' => 'The Name cannot be empty.',
            'email.required' => 'Please Enter valid Eamil Address.',
        ];
    
        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);
        }

        public function mount()
        {
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
        }

        public function updateProfile(){
            $validatedData = $this->validate();
            auth()->user()->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            session()->flash('successMessage', 'Profile updated successfully.');
        }

    public function render()
    {
        return view('livewire.profile-wire');
    }
}
