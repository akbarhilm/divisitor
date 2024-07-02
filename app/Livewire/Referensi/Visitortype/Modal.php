<?php

namespace App\Livewire\Referensi\Visitortype;

use Livewire\Component;
use App\Livewire\Forms\ReferensiForm;
use Livewire\Attributes\On;
use App\Models\Referensi;

class Modal extends Component
{

    public $receiveStats;
    public ReferensiForm $form;
    public $update = false;

    #[On('create-referensi')]
    public function create()
    {
        $this->update = false;

        $this->form->reset();
        $this->form->resetValidation();
    }

    #[On('update-referensi')]
    public function update($id)
    {
        $this->update = true;

        $referensi = Referensi::find($id);

        $this->form->setReferensi($referensi);
        $this->form->resetValidation();
    }


    public function save()
    {
        dd($this->form);
        $this->form->store();

        flash()->addSuccess('Undangan successfully ' . ($this->update ? 'updated' : 'added'));

        $this->dispatch('referensi-updated');
    }
}
