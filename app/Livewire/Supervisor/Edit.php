<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;
use App\Models\Department;
use App\Models\Supervisor;

class Edit extends Component
{
    public $supervisor, $department, $supervisor_id;

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

    public function mount($id)
    {
        $this->department = Department::all();
        $this->supervisor_id = $id;
        $this->getSupervisorById();
    }

    private function getSupervisorById()
    {
        $supervisor = Supervisor::find($this->supervisor_id);

        $this->name = $supervisor->name;
        $this->contactinfo = $supervisor->contactinfo;
        $this->cnic = $supervisor->cnic;
        $this->gender = $supervisor->gender;
        $this->address = $supervisor->address;
        $this->supervisor_department = $supervisor->department;
        $this->email = $supervisor->email;
    }

    public function render()
    {
        return view('livewire.supervisor.edit')
        ->layout('components.layouts.app',['title'=>'Update Supervisor Details']);
    }

    public function UpdateSupervisor()
    {
        $supervisor = Supervisor::where('id', $this->supervisor_id)
            ->update([
                'name' => $this->name,
                'email' => $this->email,
                'contactinfo' => $this->contactinfo,
                'cnic' => $this->cnic,
                'gender' => $this->gender,
                'department' => $this->supervisor_department,
                'address' => $this->address
            ]);

        if($supervisor){
            session()->flash('supervisor-update',"Record of Supervisor ID SPR-$this->supervisor_id Updated Successfully..");
            $this->redirectRoute('supervisors.index');
        }    
    }
}

?>