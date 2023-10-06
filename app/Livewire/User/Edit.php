<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Edit extends Component
{
    public $name,$email,$contactinfo,$cnic,$dataToSent,$user_id;

    protected $rules = [
        'name'=>'required',
        'email'=>'required|unique:users,email',
        'contactinfo'=>'required|numeric',
        'cnic'=>'required|numeric'
    ];

    public function mount($id) {

        if($id!=1){
            $this->user_id = $id;
            $this->getUserById();
        }

        else {
            $this->redirectRoute('users.index');
        }

    }

    public function getUserById(){
        $user = User::find($this->user_id);

        $this->name  = $user->name;
        $this->email = $user->email;
        $this->contactinfo = $user->contactinfo;
        $this->cnic = $user->cnic;
    }

    public function render()
    {
        return view('livewire.user.edit')
        ->layout('components.layouts.app',['title'=>'Edit User']);
    }

    public function UpdateUser(){
        $user = User::where('id',$this->user_id)
        ->update([
            'name'=>$this->name,
            'cnic'=>$this->cnic,
            'contactinfo'=>$this->contactinfo,
            'email'=>$this->email
        ]);

        if($user){
            session()->flash('user-update',"Record of USER-$this->user_id Detail Updated Successfully..");
            $this->redirectRoute('users.index');
        }
    }
}

?>