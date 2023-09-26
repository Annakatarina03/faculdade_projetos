<?php

namespace App\Livewire\Office;

use App\Models\Office;
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

        $positions = Office::where('name', 'like', "%$this->search%")
            ->orderBy('name')
            ->paginate(5);

        return view('livewire.office.index', compact(['positions']));
    }
}