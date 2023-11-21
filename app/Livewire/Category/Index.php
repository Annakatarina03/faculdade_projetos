<?php

namespace App\Livewire\Category;

use App\Models\Category;
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
         * @var \Illuminate\Pagination\LengthAwarePaginator $categories
         */

        $categories = Category::where('name', 'like', "%$this->search%")
            ->orderBy('name')
            ->paginate(5)
            ->onEachSide(0);

        return view('livewire.category.index', compact(['categories']));
    }
}
