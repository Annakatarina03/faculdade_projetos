<?php

namespace App\Livewire\RecipeTasting\MyTasting;

use App\Models\Employee;
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
        $revenues = $taster->tastingRevenues()
            ->paginate(12)
            ->onEachSide(0);

        return view('livewire.recipe-tasting.my-tasting.index', compact(['revenues']));
    }
}
