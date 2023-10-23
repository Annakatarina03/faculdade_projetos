<?php

namespace App\Livewire\Measure;

use App\Models\Measure;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Rule as RuleLivewire;
use Livewire\Features\SupportRedirects\Redirector;

class FormCreate extends Component
{
    use WithModal;

    #[RuleLivewire(rule: 'required|unique:measures,name', message: [
        'name.required' => 'Campo obrigatório',
        'name.unique' => 'Medida já registrada'

    ])]
    public string $name;

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        $measure = Measure::create([
            'name' => $this->name,
        ]);

        if ($measure) {
            return redirect()
                ->route('admin.measures.index')
                ->with('success', 'Medida registrada com sucesso');
        }

        return redirect()
            ->route('admin.measures.index')
            ->with('error', 'Erro no registro da medida');
    }

    public function render(): View
    {
        return view('livewire.measure.form-create');
    }
}
