<?php

namespace App\Livewire\Resolution;

use App\Models\Resolution;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $rowsPerPage = 5;
    public $rowsPerPageOptions = [5, 10, 20];
    public $search = '';

    public function updated($property)
    {
        if ($property == 'rowsPerPage' || $property == 'search') {
            $this->resetPage();
        }
    }

    #[On('resolution-deleted')]
    #[On('resolution-updated')]
    public function render()
    {
        $resolutions = [];

        if (!empty($this->search)) {
            $resolutions = Resolution::with(['service_catalog', 'level'])
                ->where('n_kedb_subject', 'like', "%{$this->search}%")
                ->orWhereHas('service_catalog', function ($q) {
                    $q->where('n_serv', 'like', "%{$this->search}%");
                })
                ->orWhereHas('level', function ($q) {
                    $q->where('n_kedb_lvl', 'like', "%{$this->search}%");
                })
                ->orWhere('d_entry', 'like', "%{$this->search}%")
                ->paginate($this->rowsPerPage);
        } else {
            $resolutions = Resolution::paginate($this->rowsPerPage);
        }

        return view('livewire.resolution.table', [
            'resolutions' => $resolutions
        ]);
    }
}
