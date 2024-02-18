<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{

    public $data;

    public function mount()
    {
        $this->getData();
    }

    public function render()
    {
        return view('livewire.user-index');
    }

    public function getData()
    {
        $this->data = User::all();
    }
}
