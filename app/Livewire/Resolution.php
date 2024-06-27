<?php

namespace App\Livewire;

use App\Livewire\Forms\ResolutionForm;
use App\Models\Level;
use App\Models\Resolution as ResolutionModel;
use App\Models\ServiceCatalog;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Resolution extends Component
{
    public $canModify = false;

    public function mount()
    {
    }
}
