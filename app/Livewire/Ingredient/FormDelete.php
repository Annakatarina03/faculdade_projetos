<?php

namespace App\Livewire\Ingredient;

use App\Models\Ingredient;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormDelete extends Component
{
    use WithModal;

    public bool $has_recipes;
    public Ingredient $ingredient;

    public function mount(int $id = null): void
    {
        $this->ingredient = Ingredient::find($id);
        $this->has_recipes = !$this->ingredient->revenues()->get()->isEmpty();
    }

    public function delete(Ingredient $ingredient): RedirectResponse|Redirector
    {

        if (!$ingredient) {
            return redirect()
                ->route('admin.ingredients.index')
                ->with('error', 'Ingrediente não registrado');
        }

        if ($this->has_recipes) {
            return redirect()
                ->route('admin.ingredients.index')
                ->with('error', 'Existem receitas vinculadas a esse ingrediente');
        }

        $delete_ingredient = $ingredient->delete();

        if ($delete_ingredient) {
            return redirect()
                ->route('admin.ingredients.index')
                ->with('success', 'Ingrediente excluído com sucesso');
        }

        return redirect()
            ->route('admin.ingredients.index')
            ->with('error', 'Erro na exclusão do ingrediente');
    }

    public function render(): View
    {
        return view('livewire.ingredient.form-delete');
    }
}
