<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Referensi;
use Illuminate\Support\Facades\Auth;

class ReferensiForm extends Form
{
    public ?Referensi $referensi;

    #[Validate('required', message: "Silahkan isi Nama Tipe Kunjungan")]
    public $namatypekunjungan;

    #[Validate('required', message: "Silahkan Pilih Status Non Aktif / Aktif")]
    public $receiveStats;

    #[Validate('required')]
    public $created_by;

    #[Validate('nullable')]
    public $updated_by;

    #[Validate('nullable')]
    public $updated_at;

    public function store()
    {
        //$this->created_by = Auth::user()->nik;
        $this->created_by = "930075";    // fixme

        //if (isset($this->file)) {
        //    $this->file = $this->file->store();
        //}

        Referensi::create($this->validate());
    }

    public function setReferensi(Referensi $referensi)
    {
        $this->referensi = $referensi;
        $this->namatypekunjungan = $referensi->namatypekunjungan;
        $this->receiveStats = $referensi->receiveStats;
        $this->created_by = $referensi->created_by;
    }
}
