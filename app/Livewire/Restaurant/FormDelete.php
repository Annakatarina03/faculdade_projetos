<?php

namespace App\Livewire\Restaurant;

use App\Models\Restaurant;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;

class FormDelete extends Component
{
    use WithModal;

    public Restaurant $restaurant;

    public function mount($id = null): void
    {
        $restaurant = Restaurant::where('id', $id)->first();

        $this->restaurant = $restaurant;
    }

    public function delete(Restaurant $restaurant): Redirector
    {

        if (!$restaurant) {
            return redirect('admin/restaurants')->with('error', 'Restaurante não registrado');
        }

        $restaurant_disabled = $restaurant->delete();

        if ($restaurant_disabled) {
            return redirect('admin/restaurants')->with('success', 'Restaurante excluído com sucesso');
        }

        return redirect('admin/restaurants')->with('error', 'Erro na exclusão do restaurante');
    }

    public function render(): View
    {
        return view('livewire.restaurant.form-delete');
    }
}
