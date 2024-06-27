<?php

namespace App\Livewire;

use App\Livewire\Forms\IncidentEditForm;
use App\Models\Channel;
use App\Models\Incident;
use App\Models\Level;
use App\Models\Priority;
use App\Models\Resolution;
use App\Models\ServiceCatalog;
use App\Models\Urgency;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class IncidentEdit extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $channel;
    public $serviceCatalog;
    public $urgency;
    public $priority;
    public $level;

    public $reportCategory = [
        1 => 'Pendampingan Implementasi',
        2 => 'Insiden',
        3 => 'Problem',
    ];

    public $impact = [
        1 => 'Rendah',
        2 => 'Menengah',
        3 => 'Tinggi',
    ];

    public $priorityMatrix = [
        ['4', '4', '3'],
        ['4', '3', '2'],
        ['3', '2', '1'],
    ];

    public $search = '';

    public $useExistingResolution = false;

    public IncidentEditForm $form;

    public function mount($id)
    {
        $incident = Incident::find($id);

        $this->form->setIncident($incident);

        $this->channel = Channel::all();
        $this->serviceCatalog = ServiceCatalog::all();
        $this->urgency = Urgency::all()->sort();
        $this->priority = Priority::all();
        $this->level = Level::all();
    }

    public function downloadIncidentFile()
    {
        return Storage::download($this->form->incident_file);
    }

    public function updatePriority()
    {
        $impact = $this->form->impact_id;
        $urgency = $this->form->urgency_id;

        $this->form->priority_id = $this->priorityMatrix[$impact - 1][$urgency - 1];
    }

    public function resetResolution()
    {
        $this->useExistingResolution = false;

        $this->form->reset('resolution_desc');
        $this->form->reset('level_id');
        $this->form->reset('resolution_file');
    }

    public function selectResolution($resolution)
    {
        $this->useExistingResolution = true;

        $this->form->resolution_desc = $resolution['e_kedb_res'];
        $this->form->level_id = $resolution['level']['i_id_kedblvl'];
        $this->form->resolution_file = $resolution['n_file_path'];
    }

    public function downloadResolutionFile()
    {
        return Storage::download($this->form->resolution_file);
    }

    public function deleteResolutionFile()
    {
        $this->form->reset('resolution_file');
    }

    public function save()
    {
        $this->form->update($this->useExistingResolution);

        flash()->addSuccess('Incident or problem successfully updated');

        return $this->redirectRoute('incident');
    }

    public function render()
    {
        $resolutions = [];

        if (!empty($this->search)) {
            $resolutions = Resolution::with(['service_catalog', 'level'])
                ->where('c_kedb_resstat', 1)
                ->where(function ($q) {
                    $q->where('n_kedb_subject', 'like', "%{$this->search}%")
                        ->orWhereHas('service_catalog', function ($q) {
                            $q->where('n_serv', 'like', "%{$this->search}%");
                        })
                        ->orWhereHas('level', function ($q) {
                            $q->where('n_kedb_lvl', 'like', "%{$this->search}%");
                        })
                        ->orWhere('d_entry', 'like', "%{$this->search}%");
                })
                ->paginate(5);
        } else {
            $resolutions = Resolution::where('c_kedb_resstat', 1)->paginate(5);
        }

        return view('livewire.incident-edit', [
            'resolutions' => $resolutions
        ]);
    }
}
