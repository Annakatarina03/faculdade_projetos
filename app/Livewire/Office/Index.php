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

        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $positions
         */

        $positions = Office::where('name', 'like', "%$this->search%")
            ->orderBy('name')
            ->paginate(5)->onEachSide(0);

        return view('livewire.office.index', compact(['positions']));
    }
}
