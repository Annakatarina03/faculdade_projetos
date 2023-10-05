<?php

namespace App\Livewire\Ingredient;

use App\Models\Ingredient;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Rule as RuleLivewire;

class FormCreate extends Component
{
    use WithModal;

    #[RuleLivewire(rule: 'required|unique:ingredients,name', message: [
        'name.required' => 'Campo obrigatório',
        'name.unique' => 'Ingrediente já registrado'

    ])]
    public string $name;

    public ?string $description = null;

    public function create(): Redirector
    {
        $this->validate();

        $ingredient = Ingredient::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        if ($ingredient) {
            return redirect('admin/ingredients')->with('success', 'Ingrediente registrado com sucesso');
        }

        return redirect('admin/ingredients')->with('error', 'Erro no registro do ingrediente');
    }

    public function render(): View
    {
        return view('livewire.ingredient.form-create');
    }
}
