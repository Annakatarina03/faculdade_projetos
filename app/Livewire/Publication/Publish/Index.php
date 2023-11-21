<?php

namespace App\Livewire\Publication\Publish;

use App\Models\CookBook;
use App\Traits\WithModal;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithModal;

    public string $search = '';

    public function render()
    {
        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $cookbooks
         */

        $cookbooks = CookBook::where('editor_id', auth()->user()->id)
            ->where('title', 'like', "%$this->search%")
            ->orderBy('title')
            ->paginate(5)
            ->onEachSide(0);

        return view('livewire.publication.publish.index', compact(['cookbooks']));
    }
}
