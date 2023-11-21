<?php

namespace App\Livewire\Metas;

use App\Models\SystemParameter;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithModal; 

    public function render(): View
    {
        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $metas
         */

        $metas = SystemParameter::paginate(5)->onEachSide(0);

        return view('livewire.metas.index');
    }
}
