<?php

namespace App\Livewire\Referensi\visitortype\Modal;

use App\Models\Visitortype;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $visitortypeId;

    #[On('visitortype-delete')]
    public function setResolutionId($id)
    {
        $this->visitortypeId = $id;
    }

    public function delete()
    {
        $visitortype = Visitortype::find($this->visitortypeId);

        $visitortype->delete();

        flash()->addSuccess('Visitor Type successfully deleted');

        $this->dispatch('visitortpye-delete');
        $this->redirect('referensi');
    }
}
