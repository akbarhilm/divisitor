<?php

namespace App\Livewire\Absensi\Modal;

use Livewire\Component;


use Livewire\Attributes\On;
use App\Models\Undangan;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class FormDetail extends Component
{

    use WithFileUploads;

 
    public $qty;
    public $iddetail;

 

    #[Validate(['ktps.*' => 'image|max:1024'])]
    public $ktps = [];



    #[on('scan-absen')]
    public function qty($q){
        
        $this->qty = $q;
    }

    public function save()
    {
     
        $i=0;
        foreach ($this->ktps as $ktp) {
            $ar = explode('.',$ktp->getClientOriginalName());
            $ext = end($ar);
            $name = $this->qty.'-'.$i.'.'.$ext;
          
            $ktp->storePubliclyAs('images',$name,'real_public');
            $i++;
        }
        flash()->addSuccess('Upload successfully added');
       
        $this->dispatch('upload-added');
        $this->js('window.location.reload()'); 
       
    }

    
	

	
   
	
	


}
