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

    public function mount($id = null): void
    {
        $ingredient = Ingredient::where('id', $id)->first();

        $this->ingredient = $ingredient;
        $this->name = $ingredient->name;
        $this->description = $ingredient->description;
    }

    public function render(): View
    {
        $ingredient = $this->ingredient;
        return view('livewire.ingredient.form-view', compact(['ingredient']));
    }
}
