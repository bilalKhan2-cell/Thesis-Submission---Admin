<?php

namespace App\Livewire;

use Livewire\Component;
class Breadcrumbs extends Component
{
    public $heading,$subHeading,$pageTitle;
    public function render()
    {
        return view('livewire.breadcrumbs');
    }
}
