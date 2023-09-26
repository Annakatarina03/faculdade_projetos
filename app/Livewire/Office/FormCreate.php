<?php

namespace App\Livewire\Office;

use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Rule as RuleLivewire;
use Illuminate\Support\Str;

class FormCreate extends Component
{
    use WithModal;

    #[RuleLivewire(rule: 'required|unique:positions,name', message: [
        'name.required' => 'Campo obrigatório',
        'name.unique' => 'Cargo já registrado'

    ])]
    public string $name;

    #[RuleLivewire(rule: 'required', message: [
        'description.required' => 'Campo obrigatório',
    ])]
    public string $description;

    public function create(): Redirector
    {
        $this->validate();

        $office = Office::create([
            'name' => $this->name,
            'description' => $this->description,
            'slug' => Str::slug($this->name)
        ]);

        if ($office) {
            return redirect('admin/positions')->with('success', 'Cargo registrado com sucesso');
        }

        return redirect('admin/positions')->with('error', 'Erro no registro do cargo');
    }

    public function render(): View
    {
        return view('livewire.office.form-create');
    }
}
