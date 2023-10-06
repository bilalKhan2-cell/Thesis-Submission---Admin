<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;
use App\Models\Supervisor;
use App\Models\Department;
use Illuminate\Support\Facades\Mail;
use App\Mail\SupervisorMail;
use Illuminate\Support\Str;

class Register extends Component
{

    public $supervisor, $department;

    public $name, $email, $contactinfo, $cnic, $gender, $supervisor_department, $address, $pass_key = 0;

    public $loadingState = false;
    public $message = '';

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|unique:supervisors,email',
        'cnic' => 'required|numeric|unique:supervisors,cnic',
        'contactinfo' => 'required|numeric',
        'gender' => 'required',
        'address' => 'required',
        'supervisor_department' => 'required|numeric'
    ];

    public function mount()
    {
        $departments = new Department();
        $this->department = $departments->all();
    }

    public function render()
    {
        return view('livewire.supervisor.register')
            ->layout('components.layouts.app', ['title' => 'Register Supervisor']);
    }

    public function RegisterSupervisor()
    {

        $this->loadingState = true;
        $this->message = 'Please Wait WHile Form is Submitting..';

        $this->validate();

        $supervisor = new Supervisor();

        $supervisor->name = strtoupper($this->name);
        $supervisor->email = $this->email;
        $supervisor->cnic = $this->cnic;
        $supervisor->contactinfo = $this->contactinfo;
        $supervisor->address = $this->address;
        $supervisor->gender = $this->gender;
        $supervisor->pass_key = $this->pass_key;
        $supervisor->department = $this->supervisor_department;
        $supervisor->is_first_login = 1;

        if ($supervisor->save()) {
            $this->SendEmail($supervisor->id, $this->email);

            session()->flash('supervisor-success', 'Supervisor Registered Successfully..');

            $this->redirectRoute('supervisors.index');
        }
    }

    public function SendEmail($uid, $email)
    {
        $supervisor = Supervisor::where('id', $uid)->get();
        $supervisor = $supervisor[0];

        $pass = Str::random(10);
        Supervisor::where('id', $uid)->update(['pasword' => $pass]);
        $emailContent = view('SupervisorMail', compact('supervisor', 'pass'))->render();

        $mail = Mail::to($email)->send(new SupervisorMail($emailContent));
    }
}

?>