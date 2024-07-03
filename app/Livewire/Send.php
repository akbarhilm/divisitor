<?php

namespace App\Livewire;


use Livewire\Component;
use App\Mail\Ask;
use Illuminate\Support\Facades\Mail;
use App\Models\ServiceCatalog;
use App\Livewire\Forms\IncidentForm;
use Livewire\WithFileUploads;

class Send extends Component
{
    use WithFileUploads;

    public $employees;
    public $serviceCatalog;

    public IncidentForm $form;

    public function search($query)
    {
        return Incident::search($query)->get();
    }

    public function mount()
    {
        // $this->serviceCatalog = ServiceCatalog::all();
    }

    public function new()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    public function save()
    {
        $user = $this->form->store(ask: true);

        $email = new Ask($user->nama, $this->form->ticket);
        Mail::to($user->email)->send($email);

        flash()->addSuccess('Question has been sent. Check your email.');

        $this->redirectRoute('home');
    }

    public function render()
    {
        $name = 'user test';
        $ticket = 'aaaa1111';
        return view('mail.invitation',compact('name','ticket'));
    }
}
