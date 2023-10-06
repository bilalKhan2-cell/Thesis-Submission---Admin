<?php

namespace App\Livewire\Department;

use App\Models\Department;
use Livewire\Component;

class Register extends Component
{
    public $name,$description;
    protected $rules = ['name'=>'required|unique:departments,name'];
    public function render()
    {
        return view('livewire.department.register')
        ->layout('components.layouts.app',['title'=>'University Department Registration']);
    }

    public function RegisterDepartment() {

        $this->validate();

        $department = new Department();

        $department->name = strtoupper($this->name);
        $department->comments = $this->description;

        if($department->save()){
            session()->flash('department-success','Department Registered Successfully..');
            $this->redirectRoute('departments.index');
        }
    }
}
