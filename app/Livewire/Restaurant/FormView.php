<?php

namespace App\Livewire\Restaurant;

use App\Models\Restaurant;
use App\Traits\WithModal;
use Illuminate\View\View;
use Livewire\Component;

class FormView extends Component
{

    use WithModal;

    public string $name;

    public ?string $contact;

    public Restaurant $restaurant;

    public function mount($id = null): void
    {
        $restaurant = Restaurant::where('id', $id)->first();

        $this->restaurant = $restaurant;
        $this->name = $restaurant->name;
        $this->contact = $restaurant->contact;
    }

    public function render(): View
    {
        $restaurant = $this->restaurant;
        return view('livewire.restaurant.form-view', compact(['restaurant']));
    }
}
