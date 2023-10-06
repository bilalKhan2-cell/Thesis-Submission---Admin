<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\{Department,TeamLead,Supervisor,User};

class Dashboard extends Component
{
    public $department, $team_lead, $supervisor,$users;

    public function render()
    {
        return view('livewire.dashboard')->layout('components.layouts.app',['title'=>'Welcome Admin']);
    }

    public function mount() {
        $this->department = Department::all()->count();
        $this->supervisor = Supervisor::all()->count();
        $this->users      = User::all()->count();
        $this->team_lead  = count(TeamLead::where('batch',date('Y')-3)->get());
    }
}

?>