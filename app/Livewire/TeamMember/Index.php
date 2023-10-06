<?php

namespace App\Livewire\TeamMember;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.team-member.index')
        ->layout('components.layouts.app',['title'=>'Manage FYPs Team Data']);
    }
}
