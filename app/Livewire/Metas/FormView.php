<?php

namespace App\Livewire\Metas;

use App\Models\SystemParameter;
use Livewire\Component;

class FormView extends Component
{
    
    public string $ano;

    public string $mes;

    public string $quantidade_receita;

    public SystemParameter $meta;

    public function mount(int $id = null): void
    {

        $this->meta = SystemParameter::where('month_production',$id);
        $this->ano = $this->meta->year_production;
        $this->mes = $this->meta->month_production;
        $this->quantidade_receita = $this->meta->quantity_recipes;
    }
    
    public function render()
    {
        return view('livewire.metas.form-view');
    }
}
