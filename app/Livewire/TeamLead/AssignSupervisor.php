<?php

namespace App\Livewire\TeamLead;

use Livewire\Component;
use App\Models\TeamLead;
use App\Models\Department;

class AssignSupervisor extends Component
{
    public $teams, $team_batch, $team_department, $departments;

    public $error_message, $search;

    public function render()
    {
        return view('livewire.team-lead.assign-supervisor')
        ->layout('components.layouts.app',['title'=>'Assign Supervisor']);
    }

    public function GetTeam()
    {
        if (TeamLead::where('batch', $this->team_batch)->exists()) {
            $this->teams = TeamLead::with('thesis')->where('batch', $this->team_batch)->where('department', $this->team_department)->orderBy('id')->get(['id','name','email','rollno','cnic']);
            $this->dispatch('reinitialize-datatable');
        } else {
            $this->error_message = 'No Record Found..';
        }
    }

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function Search()
    {
        //If User Input Any Text In The TextBox..
        $this->teams = TeamLead::where('department', $this->team_department)
            ->where('batch', $this->team_batch)
            ->orderBy('rollno','AESC')
            ->get();
    }
}

?>