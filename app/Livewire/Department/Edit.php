<?php

namespace App\Livewire\Department;

use Livewire\Component;
use App\Models\Department;

class Edit extends Component
{
    public $name,$description,$dept_id;

    public function mount($id){
        $this->dept_id = $id;
        $this->getDepartmentById();
    }

    private function getDepartmentById(){
        $dept = Department::find($this->dept_id);

        $this->name = $dept->name;
        $this->description = $dept->comments;
    }

    protected $rules = ['name'=>'required|unique:departments,name'];

    public function render()
    {
        return view('livewire.department.edit')
        ->layout('components.layouts.app',['title'=>'Update Department Details']);
    }

    public function UpdateDepartment(){
        $department = Department::where('id',$this->dept_id)
        ->update([
            'name'=>$this->name,
            'comments'=>$this->description
        ]);

        if($department){
            session()->flash('department-update',"Department DEPT-$this->dept_id Record(s) Updated Successfully..");
            $this->redirectRoute('departments.index');
        }
    }
}

?>