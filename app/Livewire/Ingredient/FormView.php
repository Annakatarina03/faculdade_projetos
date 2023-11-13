<?php

namespace App\Livewire\Ingredient;

use App\Models\Ingredient;
use App\Traits\WithModal;
use Illuminate\View\View;
use Livewire\Component;

class FormView extends Component
{

    use WithModal;

    public string $name;

    public ?string $description = null;

    public Ingredient $ingredient;

    public function mount(int $id = null): void
    {

        $this->ingredient = Ingredient::find($id);
        $this->name = $this->ingredient->name;
        $this->description = $this->ingredient->description;
    }

    public function render(): View
    {
        $ingredient = $this->ingredient;
        return view('livewire.ingredient.form-view', compact(['ingredient']));
    }
}
