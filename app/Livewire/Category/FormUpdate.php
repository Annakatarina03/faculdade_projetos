<?php

namespace App\Livewire\Category;

use App\Models\Category;
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

    public Category $category;

    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('categories', 'name')->ignore($this->category->id)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.unique' => 'Categoria já registrada',
        ];
    }


    public function update(): RedirectResponse|Redirector
    {

        $this->validate();

        $updated_category = $this->category->update([
            'name' => $this->name,
        ]);

        if ($updated_category) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Categoria atualizada com sucesso');
        }

        return redirect()
            ->route('admin.categories.index')
            ->with('error', 'Erro na atualização da Categoria');
    }

    public function mount(int $id = null)
    {

        $this->category = Category::find($id);

        if (!$this->category) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Categoria não registrada');
        }


        $this->name = $this->category->name;
    }

    public function render(): View
    {
        $category = $this->category;

        return view('livewire.category.form-update', compact(['category']));
    }
}
