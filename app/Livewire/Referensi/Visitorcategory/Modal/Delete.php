<?php

namespace App\Livewire\Referensi\visitorcategory\Modal;

use App\Models\VisitorCategory;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $visitorId;

    #[On('visitor-delete')]
    public function setVisitorId($id)
    {
        $this->visitorId = $id;
    }

    public function delete()
    {
        $visitor = VisitorCategory::find($this->visitorId);

        $visitor->delete();

        flash()->addSuccess('Visitor Category successfully deleted');

        $this->dispatch('visitor-delete');
        $this->redirect('referensi');
    }
}
