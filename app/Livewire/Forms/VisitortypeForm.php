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

        $this->namatypekunjungan = $visitortype->subject;
        $this->receiveStats = $visitortype->subject;
        $this->created_by = $visitortype->created_by;
    }

    public function update()
    {
        $this->updated_at = now();
        $this->updated_by = '930075';    //Auth::user()->nik;

        $visitortype = Visitortype::find($this->visitortype->id);

        //$this->file = $this->fileTransaction($resolution->file, $this->file);

        $this->visitortype->update($this->validate());
    }
}
