<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Referensi;

class ReferensiForm extends Form
{
    public ?Referensi $referensi;

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
        Referensi::create($this->all());
    }
}
