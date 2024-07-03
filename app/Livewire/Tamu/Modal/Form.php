<?php

namespace App\Livewire\Tamu\Modal;

use Livewire\Component;
use App\Livewire\Forms\TamuForm;
use App\Models\Kategori;
use App\Models\Tipe;
use Livewire\Attributes\On;
use App\Models\Tamu;

class Form extends Component
{
    public $kategori;	
    public $tipe;	
    public $idvms;	

    public TamuForm $form;
    public $update = false;

    public function mount()
    {
        $this->kategori = Kategori::all();		
        $this->tipe = Tipe::all();		
    }
	
    #[On('create-tamu')]
    public function create($idvms)
    {
        $this->update = false;

        $this->form->reset();
        $this->form->resetValidation();
		
		$this->form->idvms = $idvms;
	}
	
    #[On('update-tamu')]
    public function update($id)
    {
        $this->update = true;

        $tamu = Tamu::find($id);

        $this->form->setTamu($tamu);
        $this->form->resetValidation();
    }
	
	
    public function save()
    {
        if ($this->update) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        flash()->addSuccess('Tamu successfully ' . ($this->update ? 'updated' : 'added'));

        $this->dispatch('tamu-updated');
    }

	/*
    public function render()
    {
        return view('livewire.tamu.modal.form');
    }
	*/
}
