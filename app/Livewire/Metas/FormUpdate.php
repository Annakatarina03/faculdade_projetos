<?php

namespace App\Livewire\Metas;

use App\Models\SystemParameter;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Livewire\Component;

class FormUpdate extends Component
{
    public string $ano;

    public string $mes;

    public string $quantidade_receita;

    public SystemParameter $meta;

    public function update(): RedirectResponse|Redirector
    {

        $this->validate();

        $updated_metas = $this->meta->update([
            'month_production' => $this->mes,
            'year_production' => $this->ano,
            'quantity_recipes' => $this->quantidade_receita
        ]);

        if ($updated_metas) {
            return redirect()
                ->route('metas')
                ->with('success', 'Metas atualizadas com sucesso');
        }

        return redirect()
            ->route('metas')
            ->with('error', 'Erro na atualização das Metas');
    }

    public function mount(int $id = null)
    {

        $this->meta = SystemParameter::where('month_production',$id);
        $this->ano = $this->meta->year_production;
        $this->mes = $this->meta->month_production;
        $this->quantidade_receita = $this->meta->quantity_recipes;
       
    }

    public function render()
    {
        return view('livewire.metas.form-update');
    }
}
