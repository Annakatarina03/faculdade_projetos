<?php

namespace App\Livewire\Measure;

use App\Models\Measure;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Rule as RuleLivewire;

class FormCreate extends Component
{
    use WithModal;

    #[RuleLivewire(rule: 'required|unique:measures,name', message: [
        'name.required' => 'Campo obrigatório',
        'name.unique' => 'Medida já registrada'

    ])]
    public string $name;

    public function create(): Redirector
    {
        $this->validate();

        $measure = Measure::create([
            'name' => $this->name,
        ]);

        if ($measure) {
            return redirect('admin/measures')->with('success', 'Medida registrada com sucesso');
        }

        return redirect('admin/measures')->with('error', 'Erro no registro da medida');
    }

    public function render(): View
    {
        return view('livewire.measure.form-create');
    }
}
