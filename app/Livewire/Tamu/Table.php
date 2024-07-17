<?php

namespace App\Livewire\Tamu;

use App\Models\Tamu;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kategori;
use App\Models\Tipe;

class Table extends Component
{
	
    use WithPagination;

    public $rowsPerPage = 5;
    public $rowsPerPageOptions = [5, 10, 20];
    public $search = '';
	public $id;

    public function updated($property)
    {
        if ($property == 'rowsPerPage' || $property == 'search') {
            $this->resetPage();
        }
    }

    #[On('tamu-deleted')]
    #[On('tamu-updated')]
    public function render()
    {
        $tamu = [];
		/*
        if (!empty($this->search)) {
            $undangans = Peserta::orderBy('i_id','asc')
                ->where('e_meet_subject', 'like', "%{$this->search}%")
                ->orWhere('c_meet_online', 'like', "%{$this->search}%")
                ->orWhere('e_meet', 'like', "%{$this->search}%")
                ->orWhere('i_entry', 'like', "%{$this->search}%")
                ->orWhere('d_entry', 'like', "%{$this->search}%")
                ->paginate($this->rowsPerPage);
        } else {
		*/
            //$pesertas = Peserta::paginate($this->rowsPerPage);
            //$pesertas = Peserta::where('i_idvms','=',$this->undanganIdvms)->paginate($this->rowsPerPage);
            $tamu = Tamu::where('i_idvms','=',$this->id)->paginate($this->rowsPerPage);
            //$tamu = Tamu::where('i_idvms','=',$this->id);
			//$tamu = Tamu::where('i_idvms','=',$id)->get();
			$temp = [];

			$updatedItems = $tamu->getCollection();
			foreach($updatedItems as $t) {
				$ktgr = Kategori::select('n_categ')->where('i_id', (int)$t->kategori)->get();
				if(count($ktgr) > 0)
					$t->kategori = $ktgr[0]->n_categ;
				//$tipe = Tipe::find($idt);
				$tipe = Tipe::select('n_type')->where('i_id', $t->tipe)->get();
				if(count($tipe) > 0)
					$t->tipe = $tipe[0]->n_type;
			}

			$tamu->setCollection($updatedItems);			

        return view('livewire.tamu.table', [
            'tamu' => $tamu
        ]);
    }

}
