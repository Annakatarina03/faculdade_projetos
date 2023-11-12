<?php

namespace App\Livewire\Revenue\Revenues;

use App\Models\Revenue;
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


        $revenues = Revenue::where([['name', 'like', "%$this->search%"]])
            ->paginate(12)
            ->onEachSide(0);

        return view('livewire.revenue.revenues.index', compact(['revenues']));
    }
}
