<?php

namespace App\Livewire\Referensi\Visitortype;

use Livewire\Component;
use App\Livewire\Forms\ReferensiForm;
use Livewire\Attributes\On;
use App\Models\Referensi;

class Tambah extends Component
{
    public ReferensiForm $form;

    public $update = false;

    #[On('create-referensi')]
    public function create()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    public function save()
    {
        $this->form->store();
        flash()->addSuccess('Undangan successfully ' . ($this->update ? 'updated' : 'added'));
        $this->dispatch('referensi-updated');
    }
}
