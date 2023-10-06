<?php

namespace App\Livewire\Department;

use Livewire\Component;
use App\Models\Department;

class Index extends Component
{
    public $departments;

    public function mount(){
        $this->departments = Department::withCount('supervisors')->get();
    }

    public function render()
    {
        return view('livewire.department.index')
        ->layout('components.layouts.app',['title'=>'Departments List']);
    }

    public function DeleteDepartment($uid){
        Department::where('id',$uid)->delete();
        $this->dispatch('Department-Deeleted');
        $this->mount();
    }
}

?>