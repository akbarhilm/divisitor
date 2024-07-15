<?php

namespace App\Livewire\Absensi;

use App\Models\Undangan;
use App\Models\Tamu;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Mail\Ask;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

class Table extends Component
{
    use WithPagination;
    protected $listeners = [
        'searchinput'
   ];
    public $rowsPerPage = 5;
    public $rowsPerPageOptions = [5, 10, 20];
    public $search = '';
    public $id;

    public function searchinput($value)
{
    if(!is_null($value))
        $this->search = $value;
}

    public function updated($property)
    {
        if ($property == 'rowsPerPage' || $property == 'search') {
            $this->resetPage();
        }
    }
    // #[on('searchupdate')]
    // public function searchinput($value)
    // {
    //     if(!is_null($value))
    //         $this->search = $value;
    // }
    #[On('undangan-deleted')]
    #[On('undangan-updated')]
    public function render()
    {
        $undangans = [];
		
        if (!empty($this->search)) {
            //$undangans = Undangan::with(['e_meet_subject', 'e_meet'])
            $undangans = Undangan::orderBy('d_meet_timestart','asc')
                ->whereRaw("to_char(d_meet,'YYYYMMDD') = to_char(now(),'YYYYMMDD') and c_meet_stat = '2' and c_meet_online='0' and c_meet_qr = '{$this->search}'")
                /*->orWhereHas('service_catalog', function ($q) {
                    $q->where('n_serv', 'like', "%{$this->search}%");
                })
                ->orWhereHas('level', function ($q) {
                    $q->where('n_kedb_lvl', 'like', "%{$this->search}%");
                })*/
                // ->orWhere('c_meet_online', 'like', "%{$this->search}%")
                // ->orWhere('e_meet', 'like', "%{$this->search}%")
                // ->orWhere('i_entry', 'like', "%{$this->search}%")
                // ->orWhere('d_entry', 'like', "%{$this->search}%")
                // ->orWhere('c_meet_qr','like',"%{$this->search}%")
                ->paginate($this->rowsPerPage);
               
        } else {
            $undangans = Undangan::whereRaw("to_char(d_meet,'YYYYMMDD') = to_char(now(),'YYYYMMDD') and c_meet_stat = '2' and c_meet_online='0'")->paginate($this->rowsPerPage);

        }
       // dd($undangans);
        return view('livewire.absensi.table', [
            'undangans' => $undangans
        ]);
    }
    public function send($id){
        //dd($id);
       // $user = $this->form->store(ask: true);
       $undangan = [];
       $tamu = [];
       $tamu = Tamu::where('i_idvms','=',$id)->get();
       $undangan = Undangan::find($id);
       if($undangan->c_meet_online == "1"){
       $pdf = Pdf::loadView('mail.invitation', ['undangan'=>$undangan])->output();
       $email = new Ask($undangan,$pdf);
       }else{
        
       }
      foreach($tamu as $t){
        Mail::to($t->n_visitor_email)->send($email);
      }
       
        
        //$pdf = Pdf::loadView('mail.invitation', ['undangan'=>$undangan]);
       
        
       

        flash()->addSuccess('Invitation has been sent.');

        //$this->redirectRoute('undangan');

    }
}

