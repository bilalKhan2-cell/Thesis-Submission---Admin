<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email,$password;
    public $err;

    protected $rules = [
        'email'=>'required|email',
        'password'=>'required'
    ];

    public function render()
    {
        return view('livewire.login')->layout('components.layouts.login');
    }

    public function LoginUser(){

        $this->validate();

        $credentials = ['email'=>$this->email,'password'=>($this->password)];

        $auth = Auth::attempt($credentials);

        if($auth){
            $this->redirectRoute('dashboard.user');
        }

        else {
            $this->err = 'Invalid Username and Password..';
        }
    }
}

?>