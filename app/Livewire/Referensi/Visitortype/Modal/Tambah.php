<?php

namespace App\Livewire\Referensi\Visitortype\Modal;

use Livewire\Component;
use App\Livewire\Forms\VisitortypeForm;
use App\Models\VisitorType;
use Livewire\Attributes\On;

class Tambah extends Component
{
    public VisitortypeForm $form;

    public $update = false;

    #[On('visitortype-create')]
    public function create()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    #[On('visitortype-update')]
    public function update($id)
    {
        $this->update = true;

        $visitortype = VisitorType::find($id);

        $this->form->setVisitortype($visitortype);
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
        $this->dispatch('visitortype-updated');
        $this->redirect('referensi');
    }
}
