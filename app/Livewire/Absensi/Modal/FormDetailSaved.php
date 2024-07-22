<?php

namespace App\Livewire\Absensi\Modal;

use Livewire\Component;


use Livewire\Attributes\On;
use App\Models\Undangan;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Alimranahmed\LaraOCR\Facades\OCR;



class FormDetailSaved extends Component
{

    use WithFileUploads;

   
   
    public $iddetail;
    public $idvms;
    public $sources = [];
    public $absen = [];
    public $images = [];
    public $nik = [];
    public $nama = [];

   

    #[Validate(['ktps.*' => 'image|max:1024'])]
    public $imagePath = [];



    #[on('saved-absen')]
    public function qty($iddetail,$idvms){
        
       $this->idvms = $idvms;
      
  
       $this->iddetail = $iddetail;
        $sources = Absen::where(['i_idvms'=>$idvms,'i_idvmsdetail'=>$iddetail])->get();
        
    //    $files = glob(public_path("images\/".$iddetail."-*.*"));
    //    $nar = [];
    //    $temp=[];
      
    //     foreach($files as $file){
    //         $arr =  OCR::scan($file);
    //         $parsedText = preg_split("/\r\n|\n|\r/",$arr);
    //         $conts =["Nama","NIK"];
           
    //         foreach($parsedText as $t){
    //             foreach ($conts as $c) {
    //                if(str_contains($t,$c)){
                   
    //                 if (($pos = strpos($t, ":")) !== FALSE) {
    //                     $whatIWant = substr($t, $pos+1);
                        
                       
    //                     $temp[$c]=trim($whatIWant," ");
                        
                        
                      
    //                 }
    
    //                }
                   
    //             }
    //         }
    //         $ar = explode('/',$file);
    //         $image = end($ar);
    //         array_push($nar,['image'=>$image,...$temp]);
           
    //     }
       
        $this->sources = $sources;
        
       
        
    }

    public function save()
    {
     // dd($this->sources);
        
        foreach ($this->sources as $s) {
           
            $ar = explode('.',$s['image']);
            $ext = end($ar);
            $att = new Absen;
            $att->i_idvms = $this->idvms;
            $att->i_idvmsdetail = $this->iddetail;
            $att->n_visitor_card = $s['Nama'];
            $att->i_visitor_card = $s['NIK'];
            $att->i_entry = Auth::user()->nik;
            rename(public_path('/images/'.$s["image"]), public_path('/images/'.$this->idvms.'.'.$this->iddetail.'.'.$s['NIK'].'.'.$ext));
            //Storage::move(public_path().'images/'.$s['image'], public_path().'images/'.$this->idvms.'.'.$this->iddetail.'.'.$s['Nama']);
            $att->save();
        }
        flash()->addSuccess('Data successfully edited');

        $this->dispatch('edit-added');
    }

    
	

	
   
	
	


}
