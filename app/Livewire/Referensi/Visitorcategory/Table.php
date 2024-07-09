<?php

namespace App\Livewire\Referensi\visitorcategory;

use App\Models\VisitorCategory;
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
        $datavisitorcateg = [];

        if (!empty($this->search)) {

            $datavisitorcateg = VisitorCategory::orderBy('i_id', 'asc')
                ->where('n_categ', 'ilike', "%{$this->search}%")
                ->orWhere('c_active', 'ilike', "%{$this->search}%")
                ->orWhere('i_entry', 'ilike', "%{$this->search}%")
                ->orWhere('d_entry', 'ilike', "%{$this->search}%")
                ->paginate($this->rowsPerPage);
        } else {
            $datavisitorcateg = VisitorCategory::paginate($this->rowsPerPage);
        }

        return view('livewire.referensi.visitorcategory.table', [
            'datavisitorcateg' => $datavisitorcateg
        ]);
    }
}
