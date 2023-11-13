<?php

namespace App\Livewire\Revenue\MyRevenue;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Measure;
use App\Models\RecipeIngredient;
use App\Models\Revenue;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Features\SupportRedirects\Redirector;

class FormCreate extends Component
{

    use WithFileUploads;
    use WithModal;

    public string $recipe_name;

    public string $creation_date;

    public string $chef_name;

    public ?int $number_servings = null;

    public string $category;

    public string $method_preparation;

    public $image_recipe;

    public array $recipe_ingredients = [];

    public function rules(): array
    {
        return
            [
                'recipe_name' =>
                [
                    'required', Rule::unique('revenues', 'name')
                        ->where('chef_id', auth()->user()->id)
                ],
                'category' => ['required'],
                'method_preparation' => ['required'],
                'recipe_ingredients.*.ingredient' => ['required', 'distinct'],
                'recipe_ingredients.*.amount' => ['integer'],
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
            ];
    }

    public function add(): void
    {
        $this->recipe_ingredients[] =
            [
                'ingredient' => '',
                'amount' => '',
                'measure' => '',
            ];
    }

    public function del(int $index): void
    {
        unset($this->recipe_ingredients[$index]);
        $this->recipe_ingredients = array_values($this->recipe_ingredients);
        $this->resetValidation("recipe_ingredients.$index");
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        $revenue = Revenue::create(
            [
                'name' => $this->recipe_name,
                'chef_id' => auth()->user()->id,
                'category_id' => Category::where('name', $this->category)->first()->id,
                'creation_date' => $this->creation_date,
                'method_preparation' => $this->method_preparation,
                'number_servings' => $this->number_servings ? $this->number_servings : null,
                'unpublished_recipe' => Revenue::firstWhere('name', $this->recipe_name) === null ? true : false
            ]
        );

        $recipe_ingredients = collect($this->recipe_ingredients)
            ->map(fn ($recipe_ingredient) =>
            [
                'ingredient_id' => Ingredient::firstWhere('name', $recipe_ingredient['ingredient'])->id,
                'revenue_id' => $revenue->id,
                'measure_id' => $recipe_ingredient['measure']  ? Measure::firstWhere('name', $recipe_ingredient['measure'])->id : null,
                'amount' => $recipe_ingredient['amount'] ? $recipe_ingredient['amount'] : null,
            ]);

        $revenue->ingredients()->attach($recipe_ingredients);


        if ($this->image_recipe) {
            $extension_file = $this->image_recipe->getClientOriginalExtension();
            $name_file = uniqid() . "." . $extension_file;
            $url = $this->image_recipe->storeAs('revenues', $name_file);
            $revenue->images()->create(
                [
                    'url' => $url
                ]
            );
        }

        if ($revenue) {
            return redirect()
                ->route('revenues.my-revenues')
                ->with('success', 'Receita registrada com sucesso');
        }

        return redirect()
            ->route('revenues.my-revenues')
            ->with('error', 'Erro no registro da receita');
    }

    public function mount(): void
    {
        $this->chef_name = auth()->user()->name;
        $this->recipe_ingredients = [];
        $this->category = '';
        $this->creation_date = date('Y-m-d');
        $this->number_servings = null;
    }

    public function render(): View
    {
        $ingredients = Ingredient::all();
        $measures = Measure::all();
        $categories = Category::all();

        return view('livewire.revenue.my-revenue.form-create', compact(['ingredients', 'measures', 'categories']));
    }
}
