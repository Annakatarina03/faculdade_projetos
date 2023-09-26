<?php

namespace App\Livewire\Measure;

use App\Models\Measure;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;

class FormDelete extends Component
{
    use WithModal;

    public Measure $measure;

    public function mount($id = null): void
    {
        $measure = Measure::where('id', $id)->first();

        $this->measure = $measure;
    }

    public function delete(): Redirector
    {

        if (!$this->measure) {
            return redirect('admin/measures')->with('error', 'Medida não registrada');
        }

        $measure_disabled = $this->measure->delete();

        if ($measure_disabled) {
            return redirect('admin/measures')->with('success', 'Medida excluída com sucesso');
        }

        return redirect('admin/measures')->with('error', 'Erro na exclusão da medida');
    }

    public function render(): View
    {
        return view('livewire.measure.form-delete');
    }
}
