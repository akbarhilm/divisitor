<?php

namespace App\Livewire\Forms;

use App\Models\Resolution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ResolutionForm extends Form
{
    public ?Resolution $resolution;

    #[Validate('required', message: "Please provide a subject")]
    public $subject;

    #[Validate('required', message: "Please choose service catalog")]
    public $service_catalog_id;

    #[Validate('required', message: "Please choose level")]
    public $level_id;

    #[Validate('required', message: "Please choose category")]
    public $category;

    #[Validate('required', message: "Please provide incident description")]
    public $incident_desc;

    #[Validate('required', message: "Please provide resolution description")]
    public $resolution_desc;

    #[Validate('nullable')]
    public $file;

    #[Validate('required')]
    public $status = 9;

    #[Validate('required_if:status,2', message: "Please provide retired description")]
    public $retired_desc;

    #[Validate('nullable')]
    public $created_by;

    #[Validate('nullable')]
    public $updated_by;

    #[Validate('nullable')]
    public $updated_at;

    public function store()
    {
        //$this->created_by = Auth::user()->nik;
        $this->created_by = "930075";	// fixme

        if (isset($this->file)) {
            $this->file = $this->file->store();
        }

        Resolution::create($this->validate());
    }

    public function setResolution(Resolution $resolution)
    {
        $this->resolution = $resolution;

        $this->subject = $resolution->subject;
        $this->service_catalog_id = $resolution->service_catalog_id;
        $this->level_id = $resolution->level_id;
        $this->category = $resolution->category;
        $this->incident_desc = $resolution->incident_desc;
        $this->resolution_desc = $resolution->resolution_desc;
        $this->file = $resolution->file;
        $this->status = $resolution->status;
        $this->retired_desc = $resolution->retired_desc;
        $this->created_by = $resolution->created_by;
    }

    public function update()
    {
        $this->updated_at = now();
        $this->updated_by = Auth::user()->nik;

        $resolution = Resolution::find($this->resolution->id);

        $this->file = $this->fileTransaction($resolution->file, $this->file);

        $this->resolution->update($this->validate());
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
