<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $search;

    public function render()
    {
        $users = User::
        where('name', 'like', '%' . $this->search . '%')->
        orWhere('email', 'like', '%' . $this->search . '%')->
        orWhere('mobile', 'like', '%' . $this->search . '%')->
        paginate(15);
        return view('livewire.admin.users', compact('users'));
    }
}
