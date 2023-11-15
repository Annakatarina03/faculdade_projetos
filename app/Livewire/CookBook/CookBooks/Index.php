<?php

namespace App\Livewire\CookBook\CookBooks;

use App\Models\CookBook;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
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
         * @var \Illuminate\Pagination\LengthAwarePaginator $cookbooks
         */

        $cookbooks = CookBook::where('title', 'like', "%$this->search%")
            ->orderBy('title')
            ->paginate(5)
            ->onEachSide(0);

        return view('livewire.cook-book.cook-books.index', compact(['cookbooks']));
    }
}
