<?php

namespace App\Livewire\Forms;

use App\Api\Employee;
use App\Api\Ticket\Ask;
use App\Api\Ticket\Kedb;
use App\Models\Incident;
use App\Rules\EmployeeFound;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;

class IncidentForm extends Form
{
    public ?Incident $incident;

    #[Validate(
        [
            'required',
            'digits:6',
            new EmployeeFound
        ],
        message: [
            'required' => 'Please provide Reporter ID',
            'digits' => 'Reporter ID must be 6 digits',
        ]
    )]
    public $reporter;

    #[Validate('required', message: 'Please choose date received')]
    public $date_received;

    #[Validate('required', message: 'Please choose report channel')]
    public $report_channel_id;

    #[Validate('required', message: 'Please choose catalog service')]
    public $service_catalog_id;

    #[Validate('required', message: 'Please provide incident description')]
    public $incident_desc;

    #[Validate('nullable')]
    public $incident_file;

    #[Validate('nullable')]
    public $ticket;

    #[Validate('nullable')]
    public $created_by;

    public function store($ask = false)
    {
        if ($ask) {
            $this->report_channel_id = 3;
            $this->date_received = now();

            $this->validate();

            $user = Employee::find($this->reporter);
            $result = Ask::add([
                'kode_status'   => 'CBU',
                'kode_service'  => 'ASK',
                'nik'           => $user->nik,
                'nama'          => $user->nama,
                'email'         => $user->email,
                'organisasi'    => $user->organisasi,
                'pertanyaan'    => $this->incident_desc
            ]);

            $this->ticket = substr($result->pesan, 49, 12);
            $this->created_by = $user->nik;

            if (isset($this->incident_file)) {
                $this->incident_file = $this->incident_file->store();
            }

            Incident::create($this->all());

            return $user;
        } else {
            $this->validate();

            $result = Kedb::add([
                "kode_status"   => "CBU",
                "kode_service"  => "KEDB",
                "kode_request"  => "HS",
                "kode_role"     => "INFO_ADMIN",
                "nik"           => Auth::user()->nik,
                "nama"          => Auth::user()->nama,
                "email"         => Auth::user()->email,
                "organisasi"    => Auth::user()->organisasi,
                "deskripsi"     => "This ticket is coming from Known Error Database app, see detail in the website."
            ]);

            $this->ticket = substr($result->pesan, 16, 12);
            $this->created_by = Auth::user()->nik;

            Incident::create($this->all());
        }
    }
}
