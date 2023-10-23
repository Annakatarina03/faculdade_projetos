<?php

namespace App\Livewire\Restaurant;

use App\Helpers\Formatter;
use App\Models\Restaurant;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use SebastianBergmann\Type\VoidType;

class FormUpdate extends Component
{
    use WithModal;

    public string $name;

    public ?string $contact;

    public Restaurant $restaurant;

    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('restaurants', 'name')->ignore($this->restaurant->id)],
            'contact' => ['required', Rule::unique('restaurants', 'contact')->ignore($this->restaurant->id), 'min:10']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.unique' => 'Restaurante já registrado',
            'name.min' => 'CPF inválido',
            'contact.required' => 'Campo obrigatório',
            'contact.unique' => 'Contato já registrado',
            'contact.min' => 'Contato inválido'
        ];
    }


    public function update(): RedirectResponse|Redirector
    {

        $this->validate();

        $updated_restaurant = $this->restaurant->update([
            'name' => $this->name,
            'contact' => Formatter::clean($this->contact),
        ]);

        if ($updated_restaurant) {
            return redirect()
                ->route('admin.restaurants.index')
                ->with('success', 'Restaurante atualizado com sucesso');
        }

        return redirect()
            ->route('admin.restaurants.index')
            ->with('error', 'Erro na atualização do restaurante');
    }

    public function mount($id = null)
    {

        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return redirect()
                ->route('admin.restaurants.index')
                ->with('error', 'Restaurante não registrado');
        }

        $this->restaurant = $restaurant;
        $this->name = $restaurant->name;
        $this->contact = $restaurant->contact;
    }

    public function render(): View
    {
        $restaurant = $this->restaurant;
        return view('livewire.restaurant.form-update', compact(['restaurant']));
    }
}
