<?php

namespace App\Livewire\Measure;

use App\Models\Measure;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormDelete extends Component
{
    use WithModal;

    public Measure $measure;

    public function mount($id = null): void
    {
        $measure = Measure::find($id);
        $this->measure = $measure;
    }

    public function delete(Measure $measure): RedirectResponse|Redirector
    {

        if (!$measure) {
            return redirect()
                ->route('admin.measures.index')
                ->with('error', 'Medida não registrada');
        }

        $measure_disabled = $measure->delete();

        if ($measure_disabled) {
            return redirect()
                ->route('admin.measures.index')
                ->with('success', 'Medida excluída com sucesso');
        }

        return redirect()
            ->route('admin.measures.index')
            ->with('error', 'Erro na exclusão da medida');
    }

    public function render(): View
    {
        return view('livewire.measure.form-delete');
    }
}
