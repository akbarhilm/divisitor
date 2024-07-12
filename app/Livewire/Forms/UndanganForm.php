<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Undangan;
use Illuminate\Support\Facades\Auth;

class UndanganForm extends Form
{
    public ?Undangan $undangan;

    #[Validate('required', message: "Please provide jenis rapat")]
	public $jenisRapat="0";

    #[Validate('required', message: "Please provide nik pengundang")]
	public $pengundang;

	public $pengundangTampil;

    //#[Validate('required', message: "Please provide tanggal rapat")]
	public $tanggal;

/*
    #[Validate('required', message: "Please provide jam start")]
    #[Validate('regex:^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$^', message: "Jam harus sesuai dengan format ini hh:mm")]
    #[Validate('max:6', message: "Jam start maksimum 6 digits.")]
    #[Validate('required_if:selisihJam,0', message: "Jam finish tidak boleh sama atau sebelum jam start.")]
*/
	public $jamStart;
/*
    #[Validate('required', message: "Please provide jam finish")]
    #[Validate('regex:^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$^', message: "Jam harus sesuai dengan format ini hh:mm")]
    #[Validate('max:6', message: "Jam finish maksimum 6 digits.")]
    #[Validate('required_if:selisihJam,0', message: "Jam finish tidak boleh sama atau sebelum jam start.")]
*/
	public $jamFinish;

    #[Validate('required_if:jenisRapat,0', message: "Please choose building")]
    public $building_id;

    #[Validate('required_if:jenisRapat,0', message: "Please provide meeting room")]
    #[Validate('max:25', message: "Meeting room maksimum 25 digits.")]
	public $ruangRapat;

    #[Validate('required_if:jenisRapat,1', message: "Please provide link rapat")]
    #[Validate('max:200', message: "Link rapat maksimum 200 digits.")]
	public $linkRapat;

    #[Validate('required_if:jenisRapat,1', message: "Please provide password link rapat")]
    #[Validate('max:16', message: "Password link rapat maksimum 16 digits.")]
	public $password;

    #[Validate('required', message: "Please provide subject")]
    #[Validate('max:75', message: "Subject maksimum 75 digits.")]
    public $subject;

    #[Validate('required', message: "Please provide uraian")]
    #[Validate('max:1000', message: "Uraian maksimum 1000 digits.")]
	public $uraian;

    #[Validate('required', message: "Please provide organisasi pengundang")]
	public $orgPengundang;

    #[Validate('nullable')]
    public $created_by;

    #[Validate('nullable')]
    public $updated_by;

    #[Validate('nullable')]
    public $updated_at;

    #[Validate('nullable')]
    public $cekTanggal;

    #[Validate('nullable')]
    public $selisihJam;
	
    public function store()
    {
        $this->pengundang = Auth::user()->nik;
        $this->created_by = Auth::user()->nik;
		$this->orgPengundang = Auth::user()->organisasi;
		if($this->jenisRapat=='1')
			$this->building_id='-1';

        Undangan::create($this->validate());
    }
	
	protected $rules = [
		'tanggal' => 'required|date|after_or_equal:today',	
        //'jamStart' => 'required|date_format:H:i',
		'jamStart' => 'required|date_format:H:i|after_or_equal:currentTimeIfToday',		
        //'jamFinish' => 'required|date_format:H:i|after_or_equal:jamStart',
        'jamFinish' => 'required|date_format:H:i|after:jamStart',
    ];

    protected $messages = [
        'tanggal.required' => 'Please provide tanggal.',
        'jamStart.required' => 'Please provide jam start.',
        'jamStart.after_or_equal' => 'The selected time cannot be before the current time.',
        'jamFinish.required' => 'Please provide jam finish.',
        'jamFinish.after' => 'Jam finish tidak boleh sama dengan atau sebelum jam start.',
        'tanggal.after_or_equal' => 'Tanggal harus setelah atau sama dengan hari ini.',
    ];
	
	
    public function updated($propertyName)
    {
        //$this->validateOnly($propertyName);
		if ($propertyName === 'jamStart' && $this->tanggal === now()->format('Y-m-d')) {
            $this->validateOnly('jamStart');
        }		
    }
	
	
    public function setUndangan(Undangan $undangan)
    {
        $this->undangan = $undangan;

        $this->subject = $undangan->subject;
        $this->uraian = $undangan->uraian;
        $this->jenisRapat = $undangan->jenisRapat;
        $this->pengundang = $undangan->pengundang;
        $this->tanggal = $undangan->tanggal;
        $this->jamStart = $undangan->jamStart;
        $this->jamFinish = $undangan->jamFinish;
        $this->building_id = $undangan->building_id;
        $this->ruangRapat = $undangan->ruangRapat;
        $this->linkRapat = $undangan->linkRapat;
        $this->password = $undangan->password;
        $this->created_by = $undangan->created_by;
    }	

    public function update()
    {
        $this->updated_at = now();
        $this->updated_by = Auth::user()->nik;

        $undangan = Undangan::find($this->undangan->id);

        //$this->file = $this->fileTransaction($resolution->file, $this->file);

        $this->undangan->update($this->validate());
    }
	
}
