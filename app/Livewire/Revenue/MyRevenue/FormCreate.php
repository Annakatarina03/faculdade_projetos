<?php

namespace App\Livewire\Revenue\MyRevenue;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Ingredient;
use App\Models\Measure;
use App\Models\Revenue;
use App\Traits\WithModal;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
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

        try {

            DB::beginTransaction();

            /**
             * @var Employee $revenue_chef
             */

            $revenue_chef = Employee::firstWhere('name', $this->chef_name);

            /**
             * @var Category $revenue_category
             */

            $revenue_category = Category::firstWhere('name', $this->category);

            $revenue = new Revenue;
            $revenue->name = $this->recipe_name;
            $revenue->creation_date = $this->creation_date;
            $revenue->method_preparation = $this->method_preparation;
            $revenue->number_servings = $this->number_servings ? $this->number_servings : null;
            $revenue->unpublished_recipe = Revenue::firstWhere('name', $this->recipe_name) === null ? true : false;

            $revenue->chef()->associate($revenue_chef);
            $revenue->category()->associate($revenue_category);

            $revenue->save();

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

            $recipe_ingredients = collect($this->recipe_ingredients)
                ->map(fn ($recipe_ingredient) =>
                [
                    'ingredient_id' => Ingredient::firstWhere('name', $recipe_ingredient['ingredient'])->id,
                    'revenue_id' => $revenue->id,
                    'measure_id' => $recipe_ingredient['measure']  ? Measure::firstWhere('name', $recipe_ingredient['measure'])->id : null,
                    'amount' => $recipe_ingredient['amount'] ? $recipe_ingredient['amount'] : null,
                ])->pluck(null, 'ingredient_id');

            $revenue->ingredients()->attach($recipe_ingredients);

            DB::commit();

            if ($revenue) {
                return redirect()
                    ->route('revenues.my-revenues')
                    ->with('success', 'Receita registrada com sucesso');
            }
        } catch (Exception $e) {

            DB::rollBack();

            return redirect()
                ->route('revenues.my-revenues')
                ->with('error', $e->getMessage());
        }
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
        $ingredients = Ingredient::all()->sortBy('name');
        $measures = Measure::all()->sortBy('name');
        $categories = Category::all()->sortBy('name');

        return view('livewire.revenue.my-revenue.form-create', compact(['ingredients', 'measures', 'categories']));
    }
}
