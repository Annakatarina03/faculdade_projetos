<?php

namespace App\Livewire\Ingredient;

use App\Models\Ingredient;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormUpdate extends Component
{
    use WithModal;

    public string $name;

    public ?string $description = null;

    public Ingredient $ingredient;

    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('ingredients', 'name')->ignore($this->ingredient->id)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.unique' => 'Ingrediente já registrado',
        ];
    }


    public function update(): RedirectResponse|Redirector
    {

        $this->validate();

        $updated_ingredient = $this->ingredient->update([
            'name' => $this->name,
            'description' => $this->description ? $this->description : null,
        ]);

        if ($updated_ingredient) {
            return redirect()
                ->route('admin.ingredients.index')
                ->with('success', 'Ingrediente atualizado com sucesso');
        }

        return redirect()
            ->route('admin.ingredients.index')
            ->with('error', 'Erro na atualização do ingrediente');
    }

    public function mount(int $id = null)
    {

        $this->ingredient = Ingredient::find($id);

        if (!$this->ingredient) {
            return redirect()
                ->route('admin.ingredients.index')
                ->with('error', 'Ingrediente não registrado');
        }

        $this->name = $this->ingredient->name;
        $this->description =  $this->ingredient->description;
    }

    public function render(): View
    {
        return view('livewire.ingredient.form-update', compact(['ingredient']));
    }
}
