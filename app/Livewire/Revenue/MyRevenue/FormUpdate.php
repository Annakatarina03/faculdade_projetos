<?php

namespace App\Livewire\Revenue\MyRevenue;

use App\Models\Category;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Measure;
use App\Models\Revenue;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;

class FormUpdate extends Component
{

    use WithFileUploads;
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

    public function rules(): array
    {
        return
            [
                'recipe_name' =>
                [
                    'required', Rule::unique('revenues', 'name')
                        ->where('chef_id', auth()->user()->id)->ignore($this->revenue->id)
                ],
                'category' => ['required'],
                'method_preparation' => ['required'],
                'recipe_ingredients.*.ingredient' => ['required', 'distinct'],
                'recipe_ingredients.*.amount' => ['integer', 'min:1'],
            ];
    }

    public function messages(): array
    {
        return
            [
                'recipe_name.required' => 'Campo obrigatório',
                'recipe_name.unique' => 'Receita já registrada',
                'category.required' => 'Campo obrigatório',
                'method_preparation.required' => 'Campo obrigatório',
                'recipe_ingredients.*.ingredient.required' => 'Campo obrigatório',
                'recipe_ingredients.*.ingredient.distinct' => 'Ingrediente já adicionado',
                'recipe_ingredients.*.amount.min' => 'Valor inválido',
            ];
    }
    public function add(): void
    {
        $this->recipe_ingredients[] =
            [
                'ingredient' => '',
                'amount' => '',
                'measure' => ''
            ];
    }

    public function del(int $index): void
    {
        unset($this->recipe_ingredients[$index]);
        $this->recipe_ingredients = array_values($this->recipe_ingredients);
        $this->resetValidation("recipe_ingredients.$index");
    }

    public function update()
    {

        $this->validate();

        $revenue_category = Category::firstWhere('name', $this->category);
        $this->revenue->category()->associate($revenue_category);

        $recipe_ingredients = collect($this->recipe_ingredients)
            ->map(
                fn ($recipe_ingredient) =>
                [
                    'ingredient_id' => Ingredient::firstWhere('name', $recipe_ingredient['ingredient'])->id,
                    'amount' => $recipe_ingredient['amount'] ? $recipe_ingredient['amount'] : null,
                    'measure_id' => $recipe_ingredient['measure'] ?  Measure::firstWhere('name', $recipe_ingredient['measure'])->id : null,
                ]
            );

        $this->revenue->ingredients()->sync($recipe_ingredients);

        if ($this->image_recipe) {
            if ($this->revenue->images()->first()) {
                Storage::delete($this->revenue->images()->first()->url);
            }
            $extension_file = $this->image_recipe->getClientOriginalExtension();
            $name_file = uniqid() . "." . $extension_file;
            $url = $this->image_recipe->storeAs('revenues', $name_file);
            $this->revenue->images()->updateOrCreate([
                'url' => $url
            ]);
        }
        $updated_revenue = $this->revenue->update([
            'name' => $this->recipe_name,
            'chef_id' => auth()->user()->id,
            'creation_date' => $this->creation_date,
            'method_preparation' => $this->method_preparation,
            'number_servings' => $this->number_servings ? $this->number_servings : null,
            'unpublished_recipe' => Revenue::where('name', $this->recipe_name)->first() === null ? true : false
        ]);

        if ($updated_revenue) {
            return redirect()
                ->route('revenues.my-revenues')
                ->with('success', 'Receita atualizada com sucesso');
        }

        return redirect()
            ->route('revenues.my-revenues')
            ->with('error', 'Erro na atualização da receita');
    }

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

        return view('livewire.revenue.my-revenue.form-update', compact(['ingredients', 'measures', 'categories']));
    }
}
