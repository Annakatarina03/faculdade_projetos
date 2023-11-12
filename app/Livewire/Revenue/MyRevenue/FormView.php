<?php

namespace App\Livewire\Revenue\MyRevenue;

use App\Models\Category;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Measure;
use App\Models\Revenue;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class FormView extends Component
{

    use WithModal;

    public string $recipe_name;

    public string $creation_date;

    public string $chef_name;

    public ?int $number_servings = null;

    public string $category;

    public string $method_preparation;

    public mixed $image_recipe = null;

    public mixed $recipe_ingredients;

    public Revenue $revenue;

    public function mount(int $id = null): void
    {
        $this->revenue = Revenue::find($id);
        $this->recipe_name = $this->revenue->name;
        $this->chef_name = $this->revenue->chef->name;
        $this->number_servings = $this->revenue->number_servings;
        $this->category = $this->revenue->category->name;
        $this->creation_date = $this->revenue->creation_date;
        $this->method_preparation = $this->revenue->method_preparation;

        $this->recipe_ingredients = $this->revenue->ingredients
            ->pluck('pivot')
            ->map(
                fn ($recipe_ingredient) =>
                [
                    'ingredient' => Ingredient::find($recipe_ingredient->ingredient_id)->name,
                    'measure' => $recipe_ingredient->measure_id ? Measure::find($recipe_ingredient->measure_id)->name : '',
                    'amount' => $recipe_ingredient->amount
                ]
            )->toArray();
    }

    public function render(): View
    {
        $ingredients = Ingredient::all();
        $measures = Measure::all();
        $categories = Category::all();

        return view('livewire.revenue.my-revenue.form-view', compact(['ingredients', 'measures', 'categories']));
    }
}
