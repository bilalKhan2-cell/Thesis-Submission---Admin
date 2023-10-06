<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;
use App\Models\Supervisor;

class Index extends Component
{
    public $supervisors;
    
    public function mount() {
        $this->supervisors = Supervisor::with('dept')->get();
    }

    public function render()
    {
        return view('livewire.supervisor.index')
        ->layout('components.layouts.app',['title'=>'Registered Supervisors']);
    }

    public function Delete($id){
        Supervisor::where('id',$id)->delete();
        $this->dispatch('supervisor-deleted');
        $this->mount();
    }
}
