<?php

namespace App\Livewire;

use Livewire\Component;

class AddRole extends Component
{

    public $user;

    public $checked = [];

    public $roles = [];


    public function mount($user)
    {
        $this->user = $user;
        $this->checked = $this->user->roles->pluck('id')->toArray();
    }

    public function addRole()
    {
        $this->user->roles()->sync($this->checked);
        session_start();
        session()->flash('updated', 'role(s) Updated!');
    }


    public function render()
    {
        return view('livewire.add-role');
    }

}
