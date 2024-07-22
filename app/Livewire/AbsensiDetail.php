<?php

namespace App\Livewire;

use Livewire\Component;

class AbsensiDetail extends Component
{
    public $id;
    public function mount($id){
        $this->id = $id;
    }

    public function render()
    {
        return view('livewire.absensidetail',['id'=>$this->id]);
    }

   
}
