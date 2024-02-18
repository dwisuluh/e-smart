<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\IjinDosen;

class IjinDosenIndex extends Component
{
    public $data;

    public function mount()
    {
        $this->getData();
    }

    public function render()
    {
        return view('livewire.ijin-dosen-index');
    }

    public function getData()
    {
        $this->data = IjinDosen::latest('created_at')->get();
    }
    public function processStatus($id)
    {
        $ijin = IjinDosen::find($id);
        if ($ijin) {
            $ijin->status = ($ijin->status % 3) + 1; // 1: Open, 2: Proses, 3: Selesai
            $ijin->save();
        }
    }
}
