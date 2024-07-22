<?php

namespace App\Livewire\Forms;

use Exception;
use Throwable;
use Livewire\Form;
use App\Rules\Uppercase;
use App\Models\Visitortype;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class VisitortypeForm extends Form
{
    public ?Visitortype $visitortype;

    #[Validate([
        'namatypekunjungan' => ['required', 'string', new Uppercase],
    ])]
    public $namatypekunjungan = [];

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
        $this->created_by = Auth::user()->nik;
        Visitortype::create($this->all());
    }

    public function setVisitortype(Visitortype $visitortype)
    {
        $this->visitortype = $visitortype;

        $this->namatypekunjungan = rtrim($visitortype->n_type);
        $this->receiveStats = $visitortype->c_active;
        $this->created_by = $visitortype->i_entry;
    }

    public function update()
    {
        $this->updated_at = now();
        $this->updated_by = Auth::user()->nik;

        $visitortype = Visitortype::find($this->visitortype->id);

        $this->visitortype->update($this->validate());
    }
}
