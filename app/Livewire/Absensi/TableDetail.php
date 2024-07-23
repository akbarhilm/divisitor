<?php

namespace App\Livewire\Absensi;

use App\Models\Tamu;
use App\Models\Undangan;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Api\Employee;
use App\Models\Building;


class TableDetail extends Component
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
            $undangans = Undangan::find($this->id);
            $detail = Tamu::where('i_idvms','=',$this->id)->get();
			$user = Employee::find($undangans->i_emp_reqst);
            $gedung = Building::find($undangans->i_idbldg);
           
        //}

        return view('livewire.absensi.tabledetail', [
            'undangans'=>$undangans,
            'user'=>$user,
            'gedung'=>$gedung,
            'details' => $detail
        ]);
    }



}
