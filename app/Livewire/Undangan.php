<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Otoritas;
use Illuminate\Support\Facades\Auth;

class Undangan extends Component
{
    public $receiveStats ="0";

    public function render()
    {
		$role = [];
		$otoritas = Otoritas::select('i_idmodul')->where('i_emp', Auth::user()->nik)->where('c_active', '1')->get();
		foreach($otoritas as $o){
			array_push($role,$o->i_idmodul);
		}		
        return view('livewire.undangan', [
            'role' => $role
        ]);
    }
}
