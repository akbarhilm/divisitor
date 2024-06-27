<?php

namespace App\Livewire;

use App\Livewire\Forms\IncidentForm;
use App\Models\Channel;
use App\Models\Incident as IncidentModel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceCatalog;

class Incident extends Component
{
    use WithPagination;

    public $search = '';

    public $rowsPerPage = 5;
    public $rowsPerPageOptions = [5, 10, 20];

    public $employees;
    public $serviceCatalog;
    public $channel;

    public IncidentForm $form;

    public $incidentId = null;

    public function mount()
    {
        $this->serviceCatalog = ServiceCatalog::all();
        $this->channel = Channel::all();
    }

    public function updated($property)
    {
        if ($property == 'rowsPerPage' || $property == 'search') {
            $this->resetPage();
        }
    }

    public function new()
    {
        $this->form->reset();
        $this->form->resetValidation();

        $this->form->date_received = now()->format('Y-m-d');
    }

    public function save()
    {
        $this->form->store();

        flash()->addSuccess('Incident or problem successfully added');

        $this->redirectRoute('incident');
    }

    public function setIncidentId($value)
    {
        $this->incidentId = $value;
    }

    public function delete()
    {
        $incident = IncidentModel::find($this->incidentId);
        $incident->delete();

        flash()->addSuccess('Incident or problem successfully deleted');

        $this->resetPage();
        $this->redirectRoute('incident');
    }

    public function render()
    {
        $incidents = [];

        if (!empty($this->search)) {
            $incidents = IncidentModel::with(['service_catalog', 'priority'])
                ->where('i_emp_req', 'like', "%{$this->search}%")
                ->orWhere('d_kedb_notepick', 'like', "%{$this->search}%")
                ->orWhereHas('service_catalog', function ($query) {
                    $query->where('n_serv', 'like', "%{$this->search}%");
                })
                ->orWhereHas('priority', function ($query) {
                    $query->where('n_kedb_prty', 'like', "%{$this->search}%");
                })
                ->paginate($this->rowsPerPage);
        } else {
            $incidents = IncidentModel::paginate($this->rowsPerPage);
        }

        return view('livewire.incident', [
            'incidents' => $incidents
        ]);
    }
}
