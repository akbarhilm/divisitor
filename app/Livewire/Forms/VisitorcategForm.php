<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\VisitorCategory;
use Illuminate\Support\Facades\Auth;
use App\Rules\Uppercase;

class VisitorcategForm extends Form
{
    public ?VisitorCategory $visitorcategory;


    #[Validate([
        'categ' => ['required', 'string', new Uppercase],
    ])]
    public $categ = [];

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

        $this->categ = rtrim($visitorcategory->n_categ);
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
