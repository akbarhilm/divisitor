<?php

namespace App\Livewire\Tamu\Modal;

use Livewire\Component;
use App\Models\Tamu;
use Livewire\Attributes\On;

class Delete extends Component
{
    public $idvms;
    public $id;

    #[On('set-tamu-id')]
    public function setTamuId($idvms,$id)
    {
        $this->idvms = $idvms;
        $this->id = $id;
    }

    public function delete()
    {
        //$tamu = Tamu::find($this->id);		
		//$tamu = Tamu::where('i_idvms', $this->idvms)->where('i_id', $this->id)->get();
		$tamu = Tamu::where('i_idvms','=',$this->idvms)
				->where('i_id','=',$this->id);

        $tamu->delete();

        flash()->addSuccess('Tamu successfully deleted');

        $this->dispatch('tamu-deleted');
    }	
	/*
    public function render()
    {
        return view('livewire.tamu.modal.delete');
    }
	*/
}
