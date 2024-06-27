<?php

namespace App\Livewire\Forms;

use App\Models\Incident;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;

class IncidentEditForm extends IncidentForm
{
    #[Validate('nullable')]
    public $id;

    #[Validate('nullable')]
    public $report_channel_name;

    #[Validate('nullable')]
    public $service_catalog_name;

    #[Validate('required', message: "Please provide Initial Analysis")]
    public $initial_analysis;

    #[Validate('required', message: "Please choose Report Category")]
    public $report_category;

    #[Validate('required', message: "Please choose Impact")]
    public $impact_id;

    #[Validate('required', message: "Please choose Urgency")]
    public $urgency_id;

    #[Validate('required', message: "Please choose Impact & Urgency")]
    public $priority_id;

    #[Validate('required', message: "Please provide resolution description")]
    public $resolution_desc;

    #[Validate('required', message: "Please choose Level")]
    public $level_id;

    #[Validate('nullable')]
    public $resolution_file;

    #[Validate('nullable')]
    public $updated_by;

    #[Validate('nullable')]
    public $updated_at;

    public function setIncident(Incident $incident)
    {
        $this->incident = $incident;

        $this->id = $incident->id;
        $this->reporter = $incident->reporter;
        $this->report_channel_id = $incident->report_channel_id;
        $this->report_channel_name = $incident->report_channel_name;
        $this->date_received = $incident->date_received;
        $this->service_catalog_id = $incident->service_catalog_id;
        $this->incident_desc = $incident->incident_desc;
        $this->incident_file = $incident->incident_file;
        $this->ticket = $incident->ticket;
        $this->report_category = $incident->report_category;
        $this->initial_analysis = $incident->initial_analysis;
        $this->impact_id = $incident->impact_id;
        $this->urgency_id = $incident->urgency_id;
        $this->priority_id = $incident->priority_id;
        $this->resolution_desc = $incident->resolution_desc;
        $this->level_id = $incident->level_id;
        $this->resolution_file = $incident->resolution_file;
        $this->created_by = $incident->created_by;
    }

    public function update($useExistingResolution)
    {
        $this->updated_at = now();
        $this->updated_by = Auth::user()->nik;

        if (!$useExistingResolution) {
            $incident = Incident::find($this->id);

            $this->resolution_file = $this->fileTransaction($incident->resolution_file, $this->resolution_file);
        }

        $this->incident->update($this->validate());
    }

    private function fileTransaction($old, $new)
    {
        if (!isset($old) && isset($new)) {
            return $new->store();
        }

        if (isset($old) && isset($new)) {
            if ($old != $new) {
                Storage::delete($old);
                return $new->store();
            }

            return $old;
        }

        if (isset($old) && !isset($new)) {
            Storage::delete($old);
            return $new;
        }

        return $old;
    }
}
