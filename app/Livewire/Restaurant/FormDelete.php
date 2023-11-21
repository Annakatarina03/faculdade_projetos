<?php

namespace App\Livewire\Restaurant;

use App\Models\Restaurant;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormDelete extends Component
{
    use WithModal;

    public bool $has_employees;

    public Restaurant $restaurant;

    public function mount($id = null): void
    {
        $this->restaurant = Restaurant::find($id);
        $this->has_employees = !$this->restaurant->employees()->get()->isEmpty();
    }

    public function delete(Restaurant $restaurant): RedirectResponse|Redirector
    {

        if (!$restaurant) {
            return redirect()
                ->route('admin.restaurants.index')
                ->with('error', 'Restaurante não registrado');
        }

        if ($this->has_employees) {
            return redirect()
                ->route('admin.restaurants.index')
                ->with('error', 'Existem funcionários vinculados a esse restaurante');
        }

        $delete_restaurant = $restaurant->delete();

        if ($delete_restaurant) {
            return redirect()
                ->route('admin.restaurants.index')
                ->with('success', 'Restaurante excluído com sucesso');
        }

        return redirect()
            ->route('admin.restaurants.index')
            ->with('error', 'Erro na exclusão do restaurante');
    }

    public function render(): View
    {
        return view('livewire.restaurant.form-delete');
    }
}
