<?php

namespace App\Livewire\Referensi\visitorcategory\Modal;

use Livewire\Component;
use App\Livewire\Forms\VisitorcategForm;
use App\Models\VisitorCategory;
use Livewire\Attributes\On;

class Tambah extends Component
{
    public VisitorcategForm $form;

    public $update = false;

    #[On('visitorcategory-create')]
    public function create()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    #[On('visitorcategory-update')]
    public function update($id)
    {
        $this->update = true;

        $visitorcategory = VisitorCategory::find($id);

        $this->form->setVisitorcategory($visitorcategory);
        $this->form->resetValidation();
    }

    public function save()
    {
        if ($this->update) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        flash()->addSuccess('Visitor type successfully ' . ($this->update ? 'updated' : 'added'));
        $this->dispatch('visitorcategory-updated');
        $this->redirect('referensi');
    }
}
