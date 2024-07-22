<?php

namespace App\Livewire\Undangan;

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

    #[On('undangan-deleted')]
    #[On('undangan-updated')]
    public function render()
    {
        $undangans = [];
		
        if (!empty($this->search)) {
            //$undangans = Undangan::with(['e_meet_subject', 'e_meet'])
            $undangans = Undangan::orderBy('i_id','asc')
                ->where('e_meet_subject', 'like', "%{$this->search}%")
                /*->orWhereHas('service_catalog', function ($q) {
                    $q->where('n_serv', 'like', "%{$this->search}%");
                })
                ->orWhereHas('level', function ($q) {
                    $q->where('n_kedb_lvl', 'like', "%{$this->search}%");
                })*/
                ->orWhere('c_meet_online', 'like', "%{$this->search}%")
                ->orWhere('e_meet', 'like', "%{$this->search}%")
                ->orWhere('i_entry', 'like', "%{$this->search}%")
                ->orWhere('d_entry', 'like', "%{$this->search}%")
                ->paginate($this->rowsPerPage);
        } else {
            $undangans = Undangan::paginate($this->rowsPerPage);
        }

        return view('livewire.undangan.table', [
            'undangans' => $undangans
        ]);
    }

    #[on('send')]
    public function send($id){
        //dd($id);
       // $user = $this->form->store(ask: true);
       $undangan = [];
       $tamu = [];
       $tamu = Tamu::where('i_idvms','=',$id)->get();
       $undangan = Undangan::find($id);
      // dd($undangan);
       
       $pdf = Pdf::loadView('mail.invitation', ['undangan'=>$undangan])->output();
       $email = new Ask($undangan,$pdf);
       
      foreach($tamu as $t){
        Mail::to($t->n_visitor_email)->send($email);
      }
      $undangan->c_meet_stat = 2;
      $undangan->save();
        
        //$pdf = Pdf::loadView('mail.invitation', ['undangan'=>$undangan]);
       
        
       

        flash()->addSuccess('Invitation has been sent.');

        //$this->redirectRoute('undangan');

    }
}

