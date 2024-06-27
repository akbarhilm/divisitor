<?php

namespace App\Livewire\Undangan;

use App\Models\Undangan;
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

    #[On('undangan-deleted')]
    #[On('undangan-updated')]
    public function render()
    {
        $undangans = [];
		
        if (!empty($this->search)) {
            //$undangans = Undangan::with(['e_meet_subject', 'e_meet'])
            $undangans = Undangan::orderBy('i_id','asc')
                ->where('e_meet_subject', 'like', "%{$this->search}%")
                /*->orWhereHas('service_catalog', function ($q) {
                    $q->where('n_serv', 'like', "%{$this->search}%");
                })
                ->orWhereHas('level', function ($q) {
                    $q->where('n_kedb_lvl', 'like', "%{$this->search}%");
                })*/
                ->orWhere('c_meet_online', 'like', "%{$this->search}%")
                ->orWhere('e_meet', 'like', "%{$this->search}%")
                ->orWhere('i_entry', 'like', "%{$this->search}%")
                ->orWhere('d_entry', 'like', "%{$this->search}%")
                ->paginate($this->rowsPerPage);
        } else {
            $undangans = Undangan::paginate($this->rowsPerPage);
        }

        return view('livewire.undangan.table', [
            'undangans' => $undangans
        ]);
    }
}

