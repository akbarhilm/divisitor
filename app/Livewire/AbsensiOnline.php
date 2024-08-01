<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Undangan;
use App\Models\Perusahaan;
use App\Models\Peserta;

class AbsensiOnline extends Component
{
	public $id;
	public $idvmsdetail;
	public $tanggal;
	public $nama;
	public $alamat;
	public $kota;
	public $namaTamu;
	public $emailTamu;
	public $hpTamu;	
    public $perusahaans;
	public $statusRapat;

    protected $rules = [
        'idvmsdetail' 	=> 'required',
        'namaTamu' 		=> 'required|max:40',
        'emailTamu'		=> 'required|email|max:200',
		'hpTamu' 		=> "required|numeric",
    ];	
	
    protected $messages = [
        'idvmsdetail.required' => 'Pilih perusahaan.',
    ];	

    public function mount()
    {
        $this->perusahaans = Perusahaan::where('i_idvms',$this->id)->orderBy('i_id','asc')->get();	
    }

    public function updatePerusahaan()
    {
        $id = $this->idvmsdetail;
        $perusahaan = Perusahaan::find($id);

        $this->alamat = $perusahaan->alamat;
        $this->kota = $perusahaan->kota;
    }
	
    public function render()
    {
		$undangan = Undangan::find($this->id);
		$this->statusRapat = $undangan->jenisRapat;
		$this->tanggal = $undangan->tanggal;
		$date = new \DateTime();
		$cek = $date->format('Y-m-d');
		if($this->tanggal!=$cek)
			$this->statusRapat = "X";
		$this->nama = $undangan->subject;
		$this->namaTamu = "I D Nyoman Sadarana";
		$this->emailTamu = "nyomansad@gmail.com";
		$this->hpTamu = "082118008386";
		return view('livewire.absensi-online');	
    }

    public function save()
    {
		$this->validate();

        // Execution doesn't reach here if validation fails.
        Peserta::create([
            'idvms' 		=> $this->id,
            'idvmsdetail' 	=> $this->idvmsdetail,
            'name' 			=> $this->namaTamu,
            'email' 		=> $this->emailTamu,
            'handphone' 	=> $this->hpTamu,
            'created_by'	=> "-1"
        ]);
		
        flash()->addSuccess('Tamu online successfully added.');

    }
	
}
