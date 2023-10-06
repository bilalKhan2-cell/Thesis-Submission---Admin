<?php

namespace App\Livewire\TeamLead;

use App\Models\TeamLead;
use Livewire\Component;
use App\Models\Department;

class Index extends Component
{
    public $departments,$teams;
    
    public $team_batch,$team_department;

    public function mount() {
        $this->departments = Department::all();
    }

    public function render()
    {
        return view('livewire.team-lead.index')
        ->layout('components.layouts.app',['title'=>'Team Registration']);
    }

    public function GetList(){
        $this->teams = TeamLead::where('batch',$this->team_batch)->where('department',$this->team_department)
                       ->with('departments')->get();

        $this->dispatch('initiate-datatable');
    }
}

?>