<?php

namespace App\Livewire\Ingredient;

use App\Models\Ingredient;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;

class FormDelete extends Component
{
    use WithModal;

    public Ingredient $ingredient;

    public function mount($id = null): void
    {
        $ingredient = Ingredient::find($id);

        $this->ingredient = $ingredient;
    }

    public function delete(Ingredient $ingredient): Redirector
    {

        if (!$ingredient) {
            return redirect('admin/ingredients')->with('error', 'Ingrediente não registrado');
        }

        $ingredient_disabled = $ingredient->delete();

        if ($ingredient_disabled) {
            return redirect('admin/ingredients')->with('success', 'Ingrediente excluído com sucesso');
        }

        return redirect('admin/ingredients')->with('error', 'Erro na exclusão do ingrediente');
    }

    public function render(): View
    {
        return view('livewire.ingredient.form-delete');
    }
}
