<?php

namespace App\Livewire\Metas;

use App\Models\SystemParameter;
use App\Traits\WithModal;
use Livewire\Component;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class FormCreate extends Component
{
    use WithModal;

    public string $ano;

    public string $mes;

    public string $quantidade_receita;

    public SystemParameter $meta;

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        /**
         * @var SystemParameter $metas
         */


        $metas = SystemParameter::create([
            'month_production' => $this->mes,
            'year_production' => $this->ano,
            'quantity_recipes' => $this->quantidade_receita
        ]);

        if ($metas) {
            return redirect()
                ->route('metas')
                ->with('success', 'Metas registradas com sucesso');
        }

        return redirect()
            ->route('metas')
            ->with('error', 'Erro no registro das Metas');
    }


    public function render()
    {
        return view('livewire.metas.form-create');
    }
}
