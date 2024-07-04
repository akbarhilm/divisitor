<?php

namespace App\Livewire\Referensi\Visitortype\Modal;

use App\Models\Visitortype;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $visitortypeId = null;

    #[On('visitortype-delete')]
    public function setVisitortypeId($id)
    {
        $this->visitortypeId = $id;
    }

    public function delete()
    {
        $visitortype = VisitorType::find($this->visitortypeId);
        $visitortype->delete();

        flash()->addSuccess('Visitor Type or problem successfully deleted');

        $this->dispatch('visitortype-delete');
        $this->redirect('referensi');
    }
}
