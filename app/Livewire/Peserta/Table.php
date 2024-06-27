<?php

namespace App\Livewire\Peserta;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Peserta;

class Table extends Component
{
    #[On('peserta-updated')]
    public function render()
    {
        return view('livewire.peserta.table');
    }
}
