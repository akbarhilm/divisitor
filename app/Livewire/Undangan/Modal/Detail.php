<?php

namespace App\Livewire\Undangan\Modal;

use Livewire\Component;
use App\Livewire\Forms\UndanganForm;
use App\Models\Building;
use App\Models\Tamu;
use Livewire\Attributes\On;
use App\Models\Undangan;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\Tipe;

class Detail extends Component
{
    public $receiveStats = '0';
    public $buildings;	
    public UndanganForm $form;
    public $tamu;	

    public function mount()
    {
        $this->buildings = Building::all();	
		$this->form->pengundangTampil = Auth::user()->nama." (".Auth::user()->nik.")";
    }


    #[On('detail-undangan')]
    public function detail($id)
    {		
        $undangan = Undangan::find($id);
		$this->receiveStats = $undangan->jenisRapat;
        $this->form->setUndangan($undangan);
		$bldg = Building::select('n_bldg')->where('i_id', $undangan->building_id)->get();
		$this->form->building_id = $undangan->building_id."-".$bldg[0]->n_bldg;// di isi nama gedung
        //$this->form->resetValidation();	
		$tamu = Tamu::where('i_idvms','=',$id)->get();
		$temp = [];
		foreach($tamu as $t){
			$ktgr = Kategori::select('n_categ')->where('i_id', $t->kategori)->get();
			if(count($ktgr) > 0)
				$t->kategori = $ktgr[0]->n_categ;
			//$tipe = Tipe::find($idt);
			$tipe = Tipe::select('n_type')->where('i_id', $t->tipe)->get();
			if(count($tipe) > 0)
				$t->tipe = $tipe[0]->n_type;
			array_push($temp,$t);
		}		
		$this->tamu = $temp;		
    }
	
}
