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
        $this->restaurant = Restaurant::find($id);
        $this->name =  $this->restaurant->name;
        $this->contact =  $this->restaurant->contact;
    }

    public function render(): View
    {
        return view('livewire.restaurant.form-view');
    }
}
