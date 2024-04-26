<?php

namespace App\Livewire\Admin;

use App\Enums\UserStatus;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;

    public function changeUserStatus(User $user)
    {
        if ($user->status == UserStatus::Active->value) {
            $user->update([
                'status' => UserStatus::Inactive->value,
            ]);
        } else {
            $user->update([
                'status' => UserStatus::Active->value,
            ]);
        }
    }

    public function render()
    {
        $users = User::
        where('name', 'like', '%' . $this->search . '%')->
        orWhere('email', 'like', '%' . $this->search . '%')->
        orWhere('mobile', 'like', '%' . $this->search . '%')->
        paginate(5);
        return view('livewire.admin.users', compact('users'));
    }
}
