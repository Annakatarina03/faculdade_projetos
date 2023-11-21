<?php

namespace App\Livewire\Category;

use App\Models\Category;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormDelete extends Component
{
    use WithModal;

    public Category $category;

    public bool $is_revenues;

    public function mount($id = null): void
    {
        $this->category = Category::find($id);
        $this->is_revenues = !$this->category->revenues()->get()->isEmpty();
    }

    public function delete(Category $category): RedirectResponse|Redirector
    {

        if (!$category) {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Categoria não registrada');
        }

        if ($this->is_revenues) {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Existe receitas vinculadas a essa categoria');
        }

        $category_disabled = $category->delete();

        if ($category_disabled) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Categoria excluída com sucesso');
        }

        return redirect()
            ->route('admin.categories.index')
            ->with('error', 'Erro na exclusão da categoria');
    }

    public function render(): View
    {
        return view('livewire.category.form-delete');
    }
}
