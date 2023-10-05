<?php

namespace App\Livewire\Office;

use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\View\View;
use Livewire\Component;

class FormView extends Component
{

    use WithModal;

    public string $name;

    public ?string $description;

    public Office $office;

    public function mount($id = null): void
    {
        $office = Office::where('id', $id)->first();

        $this->office = $office;
        $this->name = $office->name;
        $this->description = $office->description;
    }

    public function render(): View
    {
        $office = $this->office;
        return view('livewire.office.form-view', compact(['office']));
    }
}
