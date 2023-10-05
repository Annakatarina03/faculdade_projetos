<?php

namespace App\Livewire\Category;

use App\Models\Category;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

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


    public function update(): Redirector
    {

        $this->validate();

        $updated_category = $this->category->update([
            'name' => $this->name,
        ]);

        if ($updated_category) {
            return redirect('admin/categories')
                ->with('success', 'Categoria atualizada com sucesso');
        }

        return redirect('admin/categories')
            ->with('error', 'Erro na atualização da Categoria');
    }

    public function mount($id = null)
    {

        $category = Category::where('id', $id)->first();

        if (!$category) {
            return redirect('admin/categories')
                ->with('error', 'Categoria não registrada');
        }

        $this->category = $category;
        $this->name = $category->name;
    }

    public function render(): View
    {
        $category = $this->category;
        return view('livewire.category.form-update', compact(['category']));
    }
}
