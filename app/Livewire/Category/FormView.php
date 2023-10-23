<?php

namespace App\Livewire\Category;

use App\Models\Category;
use App\Traits\WithModal;
use Illuminate\View\View;
use Livewire\Component;

class FormView extends Component
{

    use WithModal;

    public string $name;

    public Category $category;

    public function mount($id = null): void
    {
        $category = Category::find($id);

        $this->category = $category;
        $this->name = $category->name;
    }

    public function render(): View
    {
        $category = $this->category;
        return view('livewire.category.form-view', compact(['category']));
    }
}
