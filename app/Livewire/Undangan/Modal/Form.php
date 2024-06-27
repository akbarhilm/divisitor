<?php

namespace App\Livewire\Undangan\Modal;

use Livewire\Component;
use App\Livewire\Forms\UndanganForm;
use App\Models\Building;
use Livewire\Attributes\On;
use App\Models\Undangan;

class Form extends Component
{
    public $receiveStats = '0';
    public $buildings;	

    public UndanganForm $form;
    public $update = false;

    public function mount()
    {
        $this->buildings = Building::all();		
    }
	
    #[On('create-undangan')]
    public function create()
    {
        $this->update = false;

        $this->form->reset();
        $this->form->resetValidation();
    }
	
    #[On('update-undangan')]
    public function update($id)
    {
        $this->update = true;

        $undangan = Undangan::find($id);

        $this->form->setUndangan($undangan);
        $this->form->resetValidation();
    }
	
	
    public function save()
    {
        if ($this->update) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        flash()->addSuccess('Undangan successfully ' . ($this->update ? 'updated' : 'added'));

        $this->dispatch('undangan-updated');
    }
}
