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
        $measure = Measure::find($id);

        $this->measure = $measure;
        $this->name = $measure->name;
    }

    public function render(): View
    {
        $measure = $this->measure;
        return view('livewire.measure.form-view', compact(['measure']));
    }
}
