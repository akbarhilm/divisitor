<?php

namespace App\Livewire\Absensi\Modal;

use Livewire\Component;
use App\Livewire\Forms\UndanganForm;
use App\Models\Building;
use Livewire\Attributes\On;
use App\Models\Undangan;
use Illuminate\Support\Facades\Auth;

class Form extends Component
{
    public $receiveStats = '0';
    public $buildings;	

    public UndanganForm $form;
    public $update = false;

    public function mount()
    {
        $this->buildings = Building::all();	
		$this->form->pengundangTampil = Auth::user()->nama." (".Auth::user()->nik.")";
    }

    #[On('set-radio')]
    public function radio($param)
    {
		$this->form->jenisRapat = $param;
		$this->form->building_id = "";
		$this->form->ruangRapat = "";
		$this->form->linkRapat = "";
		$this->form->password = "";
		if($param=='1'){
			$this->form->building_id = "-1";
			$this->form->ruangRapat = "";
		}
    }
	
    #[On('create-undangan')]
    public function create()
    {
        $this->update = false;

        $this->form->reset();
        $this->form->resetValidation();
		$this->form->pengundangTampil = Auth::user()->nama." (".Auth::user()->nik.")";
    }
	
    #[On('update-undangan')]
    public function update($id)
    {
        $this->update = true;

        $undangan = Undangan::find($id);
		$this->receiveStats = $undangan->jenisRapat;
        $this->form->setUndangan($undangan);
        $this->form->resetValidation();
    }
	
	
    public function save()
    {
        if ($this->update) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        flash()->addSuccess('Undangan successfully ' . ($this->update ? 'updated' : 'added'));

        $this->dispatch('undangan-updated');
    }
}
