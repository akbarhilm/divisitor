<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Visitortype;

class VisitortypeForm extends Form
{
    public ?Visitortype $visitortype;

    #[Validate('required', message: "Silahkan isi Nama Tipe Kunjungan")]
    public $namatypekunjungan;

    #[Validate('required', message: "Silahkan Pilih Status Non Aktif / Aktif")]
    public $receiveStats;

    #[Validate('nullable')]
    public $created_by;

    #[Validate('nullable')]
    public $updated_by;

    #[Validate('nullable')]
    public $updated_at;

    public function store()
    {
        $this->validate();
        $this->created_by = "930075";    // fixme
        Visitortype::create($this->all());
    }

    public function setVisitortype(Visitortype $visitortype)
    {
        $this->visitortype = $visitortype;

        $this->namatypekunjungan = $visitortype->n_type;
        $this->receiveStats = $visitortype->c_active;
        $this->created_by = $visitortype->i_entry;
    }

    public function update()
    {
        $this->updated_at = now();
        $this->updated_by = '930075';    //Auth::user()->nik;

        $visitortype = Visitortype::find($this->visitortype->id);

        $this->visitortype->update($this->validate());
    }
}
