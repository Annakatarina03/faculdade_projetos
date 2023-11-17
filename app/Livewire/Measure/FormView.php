<?php

namespace App\Livewire\Measure;

use App\Models\Measure;
use App\Traits\WithModal;
use Illuminate\View\View;
use Livewire\Component;

class FormView extends Component
{

    use WithModal;

    public string $name;

    public Measure $measure;

    public function mount(int $id = null): void
    {
        $this->measure = Measure::find($id);
        $this->name = $this->measure->name;
    }

    public function render(): View
    {
        return view('livewire.measure.form-view');
    }
}
