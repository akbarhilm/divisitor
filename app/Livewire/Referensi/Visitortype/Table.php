<?php

namespace App\Livewire\Referensi\visitortype;

use App\Models\VisitorType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $rowsPerPage = 5;
    public $rowsPerPageOptions = [5, 10, 20];
    public $search = '';

    public $setVisitortypeId = null;

    public function updated($property)
    {
        if ($property == 'rowsPerPage' || $property == 'search') {
            $this->resetPage();
        }
    }

    #[On('visitortype-update')]
    #[On('visitortype-delete')]
    public function render()
    {
        $datavisitortype = [];

        if (!empty($this->search)) {

            $datavisitortype = VisitorType::orderBy('i_id', 'asc')
                ->where('n_type', 'ilike', "%{$this->search}%")
                ->orWhere('c_active', 'ilike', "%{$this->search}%")
                ->orWhere('i_entry', 'ilike', "%{$this->search}%")
                ->orWhere('d_entry', 'ilike', "%{$this->search}%")
                ->paginate($this->rowsPerPage);
        } else {
            $datavisitortype = VisitorType::paginate($this->rowsPerPage);
        }

        return view('livewire.referensi.visitortype.table', [
            'datavisitortype' => $datavisitortype
        ]);
    }
}
