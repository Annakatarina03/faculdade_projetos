<?php

namespace App\Livewire\Ingredient;

use App\Models\Ingredient;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormCreate extends Component
{
    use WithModal;

    public string $name;

    public ?string $description = null;

    public function rules(): array
    {
        return
            [
                "name" => ["required", "unique:ingredients,name"]
            ];
    }

    public function messages(): array
    {
        return
            [
                "name.required" => "Campo obrigatório",
                "name.unique" => 'Ingrediente já registrado'
            ];
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        /**
         * @var Ingredient $ingredient
         */


        $ingredient = Ingredient::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        if ($ingredient) {
            return redirect()
                ->route('admin.ingredients.index')
                ->with('success', 'Ingrediente registrado com sucesso');
        }

        return redirect()
            ->route('admin.ingredients.index')
            ->with('error', 'Erro no registro do ingrediente');
    }

    public function render(): View
    {
        return view('livewire.ingredient.form-create');
    }
}
