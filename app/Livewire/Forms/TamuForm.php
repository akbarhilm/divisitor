<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Tamu;
use Illuminate\Support\Facades\Auth;

class TamuForm extends Form
{
    public ?Tamu $tamu;

    #[Validate('required', message: "Please provide a idvms")]
    public $idvms;

    #[Validate('required', message: "Please provide nama")]
	public $nama;

    #[Validate('required|numeric|min:1', message: "Please provide jumlah > 0")]
	public $jumlah;

    #[Validate('required', message: "Please provide email")]
	public $email;

    #[Validate('required', message: "Please provide nomor handphone")]
	public $handphone;

    #[Validate('required', message: "Please provide nama perusahaan")]
	public $namaPerusahaan;

    #[Validate('required', message: "Please provide alamat perusahaan")]
	public $alamatPerusahaan;

    #[Validate('required', message: "Please provide kota perusahaan")]
	public $kotaPerusahaan;

    #[Validate('required', message: "Please choose kategori")]
    public $kategori_id;

    #[Validate('required', message: "Please provide tipe")]
	public $tipe_id;

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

        Tamu::create($this->validate());
    }
	
    public function setTamu(Tamu $tamu)
    {
        $this->tamu = $tamu;

        $this->idvms = $tamu->idvms;
        $this->nama = $tamu->nama;
        $this->jumlah = $tamu->jumlah;
        $this->email = $tamu->email;
        $this->handphone = $tamu->handphone;
        $this->namaPerusahaan = $tamu->namaPerusahaan;
        $this->alamatPerusahaan = $tamu->alamatPerusahaan;
        $this->kotaPerusahaan = $tamu->kotaPerusahaan;
        $this->kategori_id = $tamu->kategori_id;
        $this->tipe_id = $tamu->tipe_id;
		$this->created_by = $tamu->created_by;
    }	

    public function update()
    {
        $this->updated_at = now();
        $this->updated_by = '930075';	//Auth::user()->nik;        	

        //$tamu = Tamu::find($this->tamu->id);
		$tamu = Tamu::where('i_idvms', $this->tamu->idvms)->where('i_id', $this->tamu->id)->get();
        //$this->file = $this->fileTransaction($resolution->file, $this->file);

        $this->tamu->update($this->validate());
    }
}
