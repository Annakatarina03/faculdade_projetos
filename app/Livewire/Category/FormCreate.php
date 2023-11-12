<?php

namespace App\Livewire\Category;

use App\Models\Category;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Rule as RuleLivewire;
use Livewire\Features\SupportRedirects\Redirector;

class FormCreate extends Component
{
    use WithModal;

    public string $name;

    public function rules(): array
    {
        return
            [
                "name" => ["required", "unique:categories,name"]
            ];
    }

    public function messages(): array
    {
        return
            [
                "name.required" => "Campo obrigatório",
                "name.unique" => 'Categoria já registrada'
            ];
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        $category = Category::create([
            'name' => $this->name,
        ]);

        if ($category) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Categoria registrada com sucesso');
        }

        return redirect()
            ->route('admin.categories.index')
            ->with('error', 'Erro no registro da categoria');
    }

    public function render(): View
    {
        return view('livewire.category.form-create');
    }
}
