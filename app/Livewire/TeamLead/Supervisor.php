<?php

namespace App\Livewire\TeamLead;

use Livewire\Component;
use App\Models\TeamLead;
use App\Models\Supervisor as AllSupervisors;
use App\Models\AssignSupervisor;

class Supervisor extends Component
{

    public $supervisors, $team_supervisor, $assigned_supervisor, $team_id;

    protected $rules = [
        'assigned_supervisor' => 'required|numeric'
    ];

    public function render()
    {
        return view('livewire.team-lead.supervisor');
    }

    public function mount($id)
    {
        $this->team_id = $id;
        $dept = TeamLead::find($id);
        $this->supervisors = AllSupervisors::where('department', $dept->department)->get();

        $supervisor_assigned_records = AssignSupervisor::where('team_id', $id)->exists();

        if ($supervisor_assigned_records) {
            $this->team_supervisor = AssignSupervisor::with('supervisor.dept')->where('team_id',$id)->first();
            $this->assigned_supervisor = $this->team_supervisor->supervisor->id;
        }
    }

    public function AssignSupervisorToTeam()
    {
        $this->validate();

        $assignSupervisor = new AssignSupervisor();

        if ($assignSupervisor->where('team_id', $this->team_id)->exists()) {
            $assignSupervisor->where('team_id', $this->team_id)
                ->update([
                    'supervisor_id' => $this->assigned_supervisor
                ]);
                
            session()->flash('team-supervisor', 'Supervisor Assigned Successfully..');
            $this->redirectRoute('assign_supervisor.index');

        } else {
            $assignSupervisor->supervisor_id = $this->assigned_supervisor;
            $assignSupervisor->team_id = $this->team_id;

            $assignSupervisor->save();

            session()->flash('team-supervisor', 'Supervisor Assigned Successfully..');
            $this->redirectRoute('assign_supervisor.index');
        }
    }
}

?>