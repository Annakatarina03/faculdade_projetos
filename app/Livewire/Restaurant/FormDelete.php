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

    public Restaurant $restaurant;

    public function mount($id = null): void
    {
        $restaurant = Restaurant::find($id);

        $this->restaurant = $restaurant;
    }

    public function delete(Restaurant $restaurant): RedirectResponse|Redirector
    {

        if (!$restaurant) {
            return redirect()
                ->route('admin.restaurants.index')
                ->with('error', 'Restaurante não registrado');
        }

        $restaurant_disabled = $restaurant->delete();

        if ($restaurant_disabled) {
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
