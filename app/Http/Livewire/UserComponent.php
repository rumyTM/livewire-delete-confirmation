<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserComponent extends Component
{
    public $user_id;

    public function render()
    {
        $users = User::latest()->get();
        return view('livewire.user-component', compact('users'));
    }

    public function destroyModal($user_id)
    {
        $this->user_id = $user_id;
    }

    public function destroyConfirm()
    {
        $this->destroy(User::findOrFail($this->user_id));
    }

    public function destroyCancel()
    {
        $this->user_id = null;
    }

    public function destroy(User $user)
    {
        $this->destroyCancel();
        $user->delete();
    }
}
