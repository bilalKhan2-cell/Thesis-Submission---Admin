<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $user_data = [];

    public $error,$success;

    public $current_password,$new_password,$confirm_password;

    protected $rules = [
        'current_password'=>'required',
        'new_password'=>'required|min:10',
        'confirm_password'=>'required'
    ];

    public function render()
    {
        return view('livewire.profile')->layout('components.layouts.app',['title'=>'Dashboard - Profile']);
    }

    public function mount(){
        $this->user_data = Auth::user();
    }

    public function ChangePassword(){
        $this->validate();

        if(bcrypt($this->current_password)!=Auth::user()->getAuthPassword()){
            $this->error = "Invalid Current Password..";
        }

        else if($this->new_password!=$this->confirm_password){
            $this->error = "Password Mismatch..";
        }

        else {
            User::where('id',Auth::user()->id)->update(['password'=>bcrypt($this->new_password)]);
            $this->success = "Password Changed Successfully..";
        }
    }
}

?>