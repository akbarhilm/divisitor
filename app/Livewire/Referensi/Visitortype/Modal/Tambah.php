<?php

namespace App\Livewire\Referensi\Visitortype\Modal;

use Illuminate\Database\QueryException;
use Livewire\Component;
use App\Models\VisitorType;
use Livewire\Attributes\On;
use App\Livewire\Forms\VisitortypeForm;

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
            try {
                $this->form->store();
                flash()->addSuccess('Visitor Type successfully Added');
            } catch (QueryException $e) {
                flash()->addError('Error', 'Type Kunjungan Sudah Ada');
            }
        }

        $this->dispatch('visitortype-updated');
        $this->redirect('referensi');
    }
}
