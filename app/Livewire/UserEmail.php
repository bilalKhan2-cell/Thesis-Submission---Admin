<?php

namespace App\Livewire;

use Livewire\Component;
class UserEmail extends Component
{
    public $name,$email,$cnic,$password;

    public $receivedData;

    protected $listeners = ['dataSent' => 'setData'];

    public function setData($data)
    {
        $this->receivedData = $data;
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->cnic = $data['cnic'];
        $this->password = $data['password'];
    }

    public function render()
    {
        return view('livewire.user-email');
    }
}

?>