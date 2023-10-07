<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as AllUsers;

class User extends Component
{
    public $users;
    
    public function render()
    {
        return view('livewire.user')->with('title','Registered Users');
    }
    
    public function mount()
    {
        $this->users = AllUsers::all();
    }

    public function Delete($id){
        AllUsers::where('id',$id)->delete();
        $this->dispatch('user-deleted');
        $this->mount();
    }
}

?>