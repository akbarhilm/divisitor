<?php

namespace App\Livewire;

use Livewire\Component;

class Tamu extends Component
{
	public $id;
    public function mount($id)
    {
		$this->id = $id;
	}	
	
    public function render()
    {
        return view('livewire.tamu', [
            'id' => $this->id
        ]);
    }
}
