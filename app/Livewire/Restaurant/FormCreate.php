<?php

namespace App\Livewire\Restaurant;

use App\Models\Restaurant;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Rule as RuleLivewire;

class FormCreate extends Component
{
    use WithModal;

    #[RuleLivewire(rule: 'required|unique:restaurants,name', message: [
        'name.required' => 'Campo obrigatório',
        'name.unique' => 'Restaurante já cadastrado'

    ])]
    public string $name;

    #[RuleLivewire(rule: 'required|min:10', message: [
        'contact.required' => 'Campo obrigatório',
        'contact.min' => 'Contato inválido'
    ])]
    public ?string $contact;

    public function create(): Redirector
    {
        $this->validate();

        $restaurant = Restaurant::create([
            'name' => $this->name,
            'contact' => $this->contact
        ]);

        if ($restaurant) {
            return redirect('admin/restaurants')->with('success', 'Restaurante registrado com sucesso');
        }

        return redirect('admin/restaurants')->with('error', 'Erro no registro do restaurante');
    }

    public function render(): View
    {
        return view('livewire.restaurant.form-create');
    }
}
