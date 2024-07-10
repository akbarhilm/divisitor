<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\VisitorCategory;
use Illuminate\Support\Facades\Auth;

class VisitorcategForm extends Form
{
    public ?VisitorCategory $visitorcategory;

    #[Validate('required', message: "Silahkan isi Nama Tipe Kunjungan")]
    public $categ;

    #[Validate('required', message: "Silahkan Pilih Status Non Aktif / Aktif")]
    public $status;

    #[Validate('nullable')]
    public $created_by;

    #[Validate('nullable')]
    public $updated_by;

    #[Validate('nullable')]
    public $updated_at;

    public function store()
    {
        $this->validate();
        $this->created_by = Auth::user()->nik;
        VisitorCategory::create($this->all());
    }

    public function setVisitorcategory(VisitorCategory $visitorcategory)
    {
        $this->visitorcategory = $visitorcategory;

        $this->categ = $visitorcategory->n_categ;
        $this->status = $visitorcategory->c_active;
        $this->created_by = $visitorcategory->created_by;
    }

    public function update()
    {
        $this->updated_at = now();
        $this->updated_by = Auth::user()->nik;

        $visitortype = VisitorCategory::find($this->visitorcategory->id);

        //$this->file = $this->fileTransaction($resolution->file, $this->file);

        $this->visitorcategory->update($this->validate());
    }
}
