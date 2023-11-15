<?php

namespace App\Livewire\RecipeTasting\MyTasting;

use App\Helpers\RecipeTasting as UtilRecipeTasting;
use App\Models\Employee;
use App\Models\RecipeTasting;
use App\Models\Revenue;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormCreate extends Component
{
    use WithModal;

    public string $recipe_name;

    public string $creation_date;

    public string $chef_name;

    public ?int $number_servings = null;

    public string $category;

    public mixed $image_recipe = null;

    public string $taster_name;

    public ?string $tasting_note;

    public string $average_grade;

    public Revenue $revenue;

    public Employee $taster;

    public function rules(): array
    {
        return
            [
                'tasting_note' => ['required'],
            ];
    }

    public function messages(): array
    {
        return
            [
                'tasting_note.required' => 'Campo obrigatório',
            ];
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        $this->revenue
            ->tasting()
            ->syncWithoutDetaching(
                [
                    $this->taster->id => ['tasting_note' => (float) str_replace(",", ".", $this->tasting_note)]
                ]
            );

        return redirect()
            ->route('tasting.revenues-my-tasting')
            ->with('success', 'Degustação avaliada com sucesso');
    }

    public function mount(int $id = null): void
    {
        $this->taster = Employee::find(Auth::user()->id);
        $this->revenue = Revenue::find($id);
        $recipe_tastings = RecipeTasting::where('revenue_id', $this->revenue->id)->whereNotNull('tasting_note')->get();
        $this->recipe_name = $this->revenue->name;
        $this->chef_name = $this->revenue->chef->name;
        $this->number_servings = $this->revenue->number_servings;
        $this->category = $this->revenue->category->name;
        $this->creation_date = $this->revenue->creation_date;
        $this->taster_name = $this->taster->name;
        $this->average_grade = UtilRecipeTasting::calculateAverageScore($recipe_tastings);
        $this->tasting_note = $recipe_tastings
            ->where('taster_id', $this->taster->id)
            ->pluck('tasting_note')->first();
        $this->tasting_note = $this->tasting_note ? number_format($this->tasting_note, 1, ',', '.') : null;
    }

    public function render(): View
    {

        return view('livewire.recipe-tasting.my-tasting.form-create');
    }
}
