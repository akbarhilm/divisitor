<?php

namespace App\Livewire;

use Livewire\Component;

class Absensi extends Component
{
    public $receiveStats ="0";

    public function render()
    {
        return view('livewire.absensi');
    }
}
