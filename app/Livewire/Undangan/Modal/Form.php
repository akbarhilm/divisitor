<?php

namespace App\Livewire\Undangan\Modal;

use Livewire\Component;
use App\Livewire\Forms\UndanganForm;
use App\Models\Building;
use Livewire\Attributes\On;
<<<<<<< HEAD
use App\Models\Undangan;
=======
>>>>>>> 4070ad92919def8bcab643cdb2725a312314186e

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
<<<<<<< HEAD
	
    #[On('update-undangan')]
    public function update($id)
    {
        $this->update = true;

        $undangan = Undangan::find($id);

        $this->form->setUndangan($undangan);
        $this->form->resetValidation();
    }
	
	
=======

>>>>>>> 4070ad92919def8bcab643cdb2725a312314186e
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
