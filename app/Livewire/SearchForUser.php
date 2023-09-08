<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class SearchForUser extends Component
{

    public $search;

    public function render()
    {
        return view('livewire.search-for-user', [
            'roles' => Role::all(),
            'users' => User::with('roles')->search('username', $this->search)->get(),
        ]);
    }
}
