<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Livewire\WithPagination;

class SearchForUser extends Component
{
    use WithPagination;

    public $search;
    public function render()
    {
        return view('livewire.search-for-user', [
            'roles' => Role::all(),
            'users' => User::with('roles')->search(['username' , 'email'], $this->search)->paginate(6),
        ]);
    }
}
