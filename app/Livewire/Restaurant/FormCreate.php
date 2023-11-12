<?php

namespace App\Livewire\Restaurant;

use App\Models\Restaurant;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Rule as RuleLivewire;
use Livewire\Features\SupportRedirects\Redirector;

class FormCreate extends Component
{
    use WithModal;

    public string $name;

    public ?string $contact;

    public function rules(): array
    {
        return
            [
                'name' => ['required', 'unique:restaurants,name'],
                'contact' => ['required', 'unique:restaurants,contact', 'min:10'],
            ];
    }

    public function messages(): array
    {
        return
            [
                'name.required' => 'Campo obrigatório',
                'name.unique' => 'Restaurante já registrado',
                'contact.required' => 'Campo obrigatório',
                'contact.unique' => 'Contato já registrado',
                'contact.min' => 'Contato inválido'
            ];
    }

    public function mount(): void
    {
        $this->contact = '';
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        $restaurant = Restaurant::create([
            'name' => $this->name,
            'contact' => $this->contact
        ]);

        if ($restaurant) {
            return redirect()
                ->route('admin.restaurants.index')
                ->with('success', 'Restaurante registrado com sucesso');
        }

        return redirect()
            ->route('admin.restaurants.index')
            ->with('error', 'Erro no registro do restaurante');
    }

    public function render(): View
    {
        return view('livewire.restaurant.form-create');
    }
}
