<?php

namespace App\Livewire\Measure;

use App\Models\Measure;
use App\Models\RecipeIngredient;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormDelete extends Component
{
    use WithModal;

    public bool $has_recipes;

    public Measure $measure;

    public function mount(int $id = null): void
    {
        $this->measure = Measure::find($id);
        $this->has_recipes = !RecipeIngredient::where('measure_id', $id)->get()->isEmpty();
    }

    public function delete(Measure $measure): RedirectResponse|Redirector
    {

        if (!$measure) {
            return redirect()
                ->route('admin.measures.index')
                ->with('error', 'Medida não registrada');
        }

        if ($this->has_recipes) {
            return redirect()
                ->route('admin.measures.index')
                ->with('error', 'Existem receitas vinculadas a essa medida');
        }

        $delete_measure = $measure->delete();

        if ($delete_measure) {
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
