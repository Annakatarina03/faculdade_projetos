<?php

namespace App\Livewire\Cookbook\MyCookbooks;

use App\Models\CookBook;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FormView extends Component
{
    use WithModal;

    public string $title;

    public string $isbn;

    public string $editor;

    public CookBook $cookbook;

    public function mount(int $id = null): void
    {
        $this->cookbook = CookBook::find($id);

        $this->title = $this->cookbook->title;
        $this->isbn = $this->cookbook->isbn;
        $this->editor = $this->cookbook->employee->name;
    }

    public function render(): View
    {
        return view('livewire.cook-book.my-cook-books.form-view');
    }
}
