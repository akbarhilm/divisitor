<?php

namespace App\Livewire\Peserta\Modal;

use Livewire\Component;
use App\Livewire\Forms\UndanganForm;
use App\Models\Peserta;
use Livewire\Attributes\On;
use App\Models\Undangan;

class Form extends Component
{

    public function mount()
    {
        $this->peserta = Peserta::all();		
    }
	
    public function render()
    {
        return view('livewire.peserta.modal.form');
    }
}
