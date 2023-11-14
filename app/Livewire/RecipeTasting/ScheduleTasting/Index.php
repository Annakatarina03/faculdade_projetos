<?php

namespace App\Livewire\RecipeTasting\ScheduleTasting;

use App\Models\Employee;
use App\Models\Revenue;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithModal;

    public string $search = '';

    public function render(): View
    {
        $taster = Employee::find(Auth::user()->id);
        $tasterRevenuesId = $taster->tastingRevenues->pluck('id');
        $revenues = Revenue::where('name', 'like', "%$this->search%")
            ->whereNotIn('id', $tasterRevenuesId)
            ->paginate(12)
            ->onEachSide(0);

        return view('livewire.recipe-tasting.schedule-tasting.index', compact(['revenues']));
    }
}
