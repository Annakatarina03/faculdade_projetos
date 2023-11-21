<?php

namespace App\Livewire\RecipeTasting\ScheduleTasting;

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

    public string $tasting_date;

    public string $average_grade;

    public Revenue $revenue;

    public Employee $taster;

    public function rules(): array
    {
        return
            [
                'tasting_date' => ['required', 'after_or_equal:today']
            ];
    }

    public function messages(): array
    {
        return
            [
                'tasting_date.required' => 'Campo obrigatório',
                'tasting_date.after_or_equal' => 'Data inválida'
            ];
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        $this->revenue->tasting()
            ->attach(
                [
                    $this->taster->id => ['tasting_date' => $this->tasting_date]
                ]
            );

        return redirect()
            ->route('tasting.revenues-schedule-tasting')
            ->with('success', 'Degustação marcada com sucesso');
    }

    public function mount(int $id = null): void
    {
        $this->taster = Employee::find(Auth::user()->id);
        $this->revenue = Revenue::find($id);
        $recipe_tastings = RecipeTasting::where('revenue_id', $this->revenue->id)->get();
        $this->recipe_name = $this->revenue->name;
        $this->chef_name = $this->revenue->chef->name;
        $this->number_servings = $this->revenue->number_servings;
        $this->category = $this->revenue->category->name;
        $this->creation_date = $this->revenue->creation_date;
        $this->taster_name = $this->taster->name;
        $this->average_grade = UtilRecipeTasting::calculateAverageScore($recipe_tastings);
    }

    public function render(): View
    {
        return view('livewire.recipe-tasting.schedule-tasting.form-create');
    }
}
