<?php

namespace App\Livewire\Referensi\visitortype;

use App\Models\Referensi;
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

    public function setVisitortypeId($value)
    {
        $this->setVisitortypeId = $value;
    }

    public function delete()
    {
        $visitortype = Referensi::find($this->setVisitortypeId);
        $visitortype->delete();

        flash()->addSuccess('Incident or problem successfully deleted');

        $this->resetPage();
        $this->redirectRoute('incident');
    }

    #[On('undangan-deleted')]
    #[On('undangan-updated')]
    public function render()
    {
        $datavisitortype = [];

        if (!empty($this->search)) {

            $datavisitortype = Referensi::orderBy('i_id', 'asc')
                ->where('n_type', 'ilike', "%{$this->search}%")
                ->orWhere('c_active', 'ilike', "%{$this->search}%")
                ->orWhere('i_entry', 'ilike', "%{$this->search}%")
                ->orWhere('d_entry', 'ilike', "%{$this->search}%")
                ->paginate($this->rowsPerPage);
        } else {
            $datavisitortype = Referensi::paginate($this->rowsPerPage);
        }

        return view('livewire.referensi.visitortype.table', [
            'datavisitortype' => $datavisitortype
        ]);
    }
}
