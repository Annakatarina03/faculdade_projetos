<?php

namespace App\Livewire\Cookbook\MyCookBooks;

use App\Models\CookBook;
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
        $cookbooks = CookBook::where('id', auth()->user()->id)
            ->where([['title', 'like', "%$this->search%"]])
            ->orderBy('title')
            ->paginate(5)
            ->onEachSide(0);

        return view('livewire.cook-book.my-cook-books.index', compact(['cookbooks']));
    }
}
