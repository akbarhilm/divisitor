<?php

namespace App\Livewire\Undangan\Modal\Peserta;

use App\Models\Peserta;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $rowsPerPage = 5;
    public $rowsPerPageOptions = [5, 10, 20];
    public $search = '';
	public $undanganIdvms;

    #[On('set-undangan-idvms')]
    public function setUndanganIdvms($id)
    {
        $this->undanganIdvms = $id;
    }
	
    public function updated($property)
    {
        if ($property == 'rowsPerPage' || $property == 'search') {
            $this->resetPage();
        }
    }

    #[On('peserta-deleted')]
    #[On('peserta-updated')]
    public function render()
    {
        $pesertas = [];
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
            $pesertas = Peserta::where('i_idvms','=',$this->undanganIdvms)->paginate($this->rowsPerPage);
			//$id=1;
            //$pesertas = Peserta::find($id);
            //$pesertas = Peserta::all();
        //}

        return view('livewire.undangan.modal.peserta.table', [
            'pesertas' => $pesertas
        ]);
    }
}
