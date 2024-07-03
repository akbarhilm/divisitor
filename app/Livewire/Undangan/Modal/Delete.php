<?php

namespace App\Livewire\Undangan\Modal;

use Livewire\Component;
use App\Models\Undangan;
use Livewire\Attributes\On;

class Delete extends Component
{
    public $undanganId;

    #[On('set-undangan-id')]
    public function setUndanganId($id)
    {
        $this->undanganId = $id;
    }

    public function delete()
    {
        $undangan = Undangan::find($this->undanganId);
        $undangan->delete();

        flash()->addSuccess('Undangan successfully deleted');

        $this->dispatch('undangan-deleted');
    }	
	/*
    public function render()
    {
        return view('livewire.undangan.modal.delete');
    }
	*/
}
