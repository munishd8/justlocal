<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ChangePasswordWire extends Component
{
        public $current_password;
        public $password;
        public $password_confirmation;


    
        public function updated($fields)
        {
            $this->validateOnly($fields,[
                'current_password'=>'required',
                'password' => 'required|min:3|confirmed|different:current_password'
            ]);
        }


        public function changePassword(){
            $this->validate([
                'current_password'=>'required',
                'password' => 'required|min:4|confirmed|different:current_password'
            ]);


            if(Hash::check($this->current_password,auth()->user()->password))
            {
                auth()->user()->update([
                    'password' => Hash::make($this->password)
                ]);
                session()->flash('successMessage','Password has been changed successfully!');
                $this->current_password = '';
                $this->password = '';
                $this->password_confirmation = '';
            }
            else
            {
                session()->flash('passwordError','Password does not match!');
            }
        }

    public function render()
    {
        return view('livewire.change-password-wire');
    }
}
