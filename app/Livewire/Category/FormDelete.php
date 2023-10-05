<?php

namespace App\Livewire\Category;

use App\Models\Category;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;

class FormDelete extends Component
{
    use WithModal;

    public Category $category;
    public bool $is_revenues;


    public function mount($id = null): void
    {
        $this->category = Category::find($id);
        $this->is_revenues = !empty($this->category->revenues()->get()->toArray());
    }

    public function delete(Category $category): Redirector
    {

        if (!$category) {
            return redirect('admin/categories')
                ->with('error', 'Categoria não registrada');
        }

        if ($this->is_revenues) {
            return redirect('admin/categories')
                ->with('error', 'Existe receitas vinculados a essa categoria');
        }
        $category_disabled = $category->delete();

        if ($category_disabled) {
            return redirect('admin/categories')
                ->with('success', 'Categoria excluída com sucesso');
        }

        return redirect('admin/categories')
            ->with('error', 'Erro na exclusão da categoria');
    }

    public function render(): View
    {
        return view('livewire.category.form-delete');
    }
}
