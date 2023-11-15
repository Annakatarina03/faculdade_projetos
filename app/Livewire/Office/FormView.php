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

    public function mount(int $id = null): void
    {
        $this->office = Office::find($id);
        $this->name = $this->office->name;
        $this->description = $this->office->description;
    }

    public function render(): View
    {
        return view('livewire.office.form-view');
    }
}
