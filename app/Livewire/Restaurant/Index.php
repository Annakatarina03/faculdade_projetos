<?php

namespace App\Livewire\Restaurant;

use App\Models\Restaurant;
use App\Traits\WithModal;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithModal;

    public string $search = '';

    public function render(): View
    {

        $restaurants = Restaurant::where('name', 'like', "%$this->search%")
            ->orderBy('name')
            ->paginate(5)->onEachSide(0);

        return view('livewire.restaurant.index', compact(['restaurants']));
    }
}
