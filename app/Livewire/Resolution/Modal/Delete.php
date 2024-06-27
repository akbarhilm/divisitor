<?php

namespace App\Livewire\Resolution\Modal;

use App\Models\Resolution;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $resolutionId;

    #[On('set-resolution-id')]
    public function setResolutionId($id)
    {
        $this->resolutionId = $id;
    }

    public function delete()
    {
        $resolution = Resolution::find($this->resolutionId);
        $resolution->delete();

        flash()->addSuccess('Resolution successfully deleted');

        $this->dispatch('resolution-deleted');
    }
}
