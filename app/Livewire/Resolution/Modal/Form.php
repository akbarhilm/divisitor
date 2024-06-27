<?php

namespace App\Livewire\Resolution\Modal;

use App\Enums\Category;
use App\Enums\Status;
use App\Livewire\Forms\ResolutionForm;
use App\Models\Level;
use App\Models\Resolution;
use App\Models\ServiceCatalog;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $serviceCatalog;
    public $level;
    public $status;
    public $category;

    public ResolutionForm $form;

    public $update = false;

    public function mount()
    {
        $this->serviceCatalog = ServiceCatalog::all();
        $this->level = Level::all();
        $this->status = Status::cases();
        $this->category = Category::cases();
    }

    #[On('create-resolution')]
    public function create()
    {
        $this->update = false;

        $this->form->reset();
        $this->form->resetValidation();
    }

    #[On('update-resolution')]
    public function update($id)
    {
        $this->update = true;

        $resolution = Resolution::find($id);

        $this->form->setResolution($resolution);
        $this->form->resetValidation();
    }

    public function save()
    {
        if ($this->update) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        flash()->addSuccess('Resolution successfully ' . ($this->update ? 'updated' : 'added'));

        $this->dispatch('resolution-updated');
    }

    public function downloadFile()
    {
        return Storage::download($this->form->file);
    }

    public function deleteFile()
    {
        $this->form->reset('file');
    }
}
