<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Undangan;

class UndanganForm extends Form
{
    public ?Undangan $undangan;

    #[Validate('required', message: "Please provide a subject")]
    public $subject;

    #[Validate('required', message: "Please provide a subject")]
	public $uraian;

    #[Validate('required', message: "Please provide jenis rapat")]
	public $jenisRapat='0';

    #[Validate('required', message: "Please provide organisasi pengundang")]
	public $orgPengundang='IT2400';

    #[Validate('required', message: "Please provide nik pengundang")]
	public $pengundang;

    #[Validate('required', message: "Please provide tanggal rapat")]
	public $tanggal;

    #[Validate('required', message: "Please provide jam start")]
	public $jamStart;

    #[Validate('required', message: "Please provide jam finish")]
	public $jamFinish="17";

    #[Validate('required_if:jenisRapat,0', message: "Please choose building")]
    public $building_id;

    #[Validate('required_if:jenisRapat,0', message: "Please provide meeting room")]
	public $ruangRapat;

    #[Validate('required_if:jenisRapat,1', message: "Please provide link rapat")]
	public $linkRapat;

    #[Validate('required_if:jenisRapat,1', message: "Please provide password link rapat")]
	public $password;

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

        //if (isset($this->file)) {
        //    $this->file = $this->file->store();
        //}

        Undangan::create($this->validate());
    }
	/*
    public function setUndangan(Undangan $undangan)
    {
        $this->undangan = $undangan;

        $this->subject = $undangan->subject;
        $this->uraian = $undangan->uraian;
        $this->jenisRapat = $undangan->jenisRapat;
        $this->pengundang = $undangan->pengundang;
        $this->tanggal = $undangan->tanggal;
    }	
	*/
}
