<?php

namespace App\Livewire\User;

use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public $name, $email, $contactinfo, $cnic, $dataToSent;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'contactinfo' => 'required|numeric',
        'cnic' => 'required|numeric'
    ];

    public function render()
    {
        return view('livewire.user.register')->layout('components.layouts.app',['title'=>'Register User']);
    }

    public function RegisterUser()
    {

        $this->validate();

        $user = new User();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->contactinfo = $this->contactinfo;
        $user->cnic = $this->cnic;
        $user->is_first_login = 1;

        if ($user->save()) {

            if ($this->SendEmail($user->id, $this->email)) {
                session()->flash('user-success', 'User Registered Successfully..');
                $this->redirectRoute('users.index');
            }
        }
    }

    public function SendEmail($uid, $email)
    {

        $otp = Str::random(10);
        $user_data = User::where('id', $uid)->get();
        $user_data = $user_data[0];

        User::where('id', $uid)->update(['password' => $otp]);

        $emailContent = view('UserMail', compact('user_data', 'otp'))->render();

        Mail::to($email)->send(new UserMail($emailContent));

        return true;
    }
}

?>