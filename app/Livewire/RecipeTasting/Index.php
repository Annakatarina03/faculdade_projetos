<?php

namespace App\Livewire\RecipeTasting;

use App\Models\Employee;
use App\Models\Revenue;
use App\Traits\WithModal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithModal;

    public string $search = '';


    public function render()
    {
        $taster = Employee::where('id', Auth::user()->id)->first();
        $tasterRevenuesId = $taster->tastingRevenues->pluck('id');
        dd(Revenue::has('tasting')->get()->taster);
        $revenues = Revenue::where('name', 'like', "%$this->search%")
            ->whereNotIn('id', $tasterRevenuesId)
            ->paginate(12)
            ->onEachSide(0);

        return view('livewire.recipe-tasting.index', compact(['revenues']));
    }
}
