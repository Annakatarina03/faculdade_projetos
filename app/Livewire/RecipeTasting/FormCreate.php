<?php

namespace App\Livewire\RecipeTasting;

use App\Models\Employee;
use App\Models\Revenue;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Rule as RuleLivewire;


class FormCreate extends Component
{
    use WithModal;

    public Employee $taster;

    public Revenue $revenue;

    public string $taster_name;

    public string $chef_name;

    public string $revenue_name;

    #[RuleLivewire(rule: 'required|after_or_equal:today', message: [
        'tasting_date.required' => 'Campo obrigatório',
        'tasting_date.after_or_equal' => 'Data inválida'
    ])]
    public string $tasting_date;

    public function create()
    {
        $this->validate();

        DB::beginTransaction();

        try {

            $this->taster
                ->tastingRevenues()
                ->attach($this->revenue->id, [
                    'tasting_date' => $this->tasting_date
                ]);
            DB::commit();
            return redirect()->route('tasting.revenues-schedule-tasting')->with('success', 'Degustação marcada com sucesso');
        } catch (UniqueConstraintViolationException $e) {
            DB::rollBack();
            return redirect()->route('tasting.revenues-schedule-tasting')->with('error', 'Erro na marcação da degustação');
        }
    }

    public function mount($id = null): void
    {
        $this->taster = Employee::where('id', Auth::user()->id)->first();
        $this->revenue = Revenue::where('id', $id)->first();

        $this->taster_name = $this->taster->name;
        $this->chef_name = $this->revenue->chef->name;
        $this->revenue_name = $this->revenue->name;
    }

    public function render(): View
    {
        return view('livewire.recipe-tasting.form-create');
    }
}
