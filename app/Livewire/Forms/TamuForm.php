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
    #[Validate('max:30', message: "Nama maksimum 30 digits.")]
	public $nama;

    #[Validate('required', message: "Please provide jumlah > 0")]
    #[Validate('numeric', message: "Jumlah harus angka.")]
    #[Validate('min:1', message: "Jumlah harus minimum 1.")]
	public $jumlah;

    #[Validate('required', message: "Please provide email")]
    #[Validate('max:30', message: "Email maksimum 30 digits.")]
	public $email;

    #[Validate('required', message: "Please provide nomor handphone")]
    #[Validate('regex:/^([0-9\s\-\+\(\)]*)$/', message: "Handphone harus angka .")]
    #[Validate('max:30', message: "Handphone maksimum 30 digits.")]
	public $handphone;

    #[Validate('required', message: "Please provide nama perusahaan")]
    #[Validate('max:40', message: "Nama perusahaan maksimum 40 digits.")]
	public $namaPerusahaan;

    #[Validate('required', message: "Please provide alamat perusahaan")]
    #[Validate('max:50', message: "Alamat perusahaan maksimum 50 digits.")]
	public $alamatPerusahaan;

    #[Validate('required', message: "Please provide kota perusahaan")]
    #[Validate('max:30', message: "Kota perusahaan maksimum 30 digits.")]
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
        $this->created_by = Auth::user()->nik;

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
        $this->updated_by = Auth::user()->nik;        	

        //$tamu = Tamu::find($this->tamu->id);
		$tamu = Tamu::where('i_idvms', $this->tamu->idvms)->where('i_id', $this->tamu->id)->get();
        //$this->file = $this->fileTransaction($resolution->file, $this->file);

        $this->tamu->update($this->validate());
    }
}
