<?php

namespace App\Livewire\Cookbook\MyCookbooks;

use App\Models\CookBook;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Http\RedirectResponse;

class FormDelete extends Component
{

    use WithModal;

    public bool $has_publications;

    public CookBook $cookbook;

    public function mount(int $id = null): void
    {
        $this->cookbook = CookBook::find($id);
        $this->has_publications = !$this->cookbook->revenues()->get()->isEmpty();
    }

    public function delete(CookBook $cookBook): RedirectResponse|Redirector
    {

        if (!$cookBook) {
            return redirect()
                ->route('cookbook.my-cookbooks')
                ->with('error', 'Livro de receitas não registrado');
        }

        if ($this->has_publications) {
            return redirect()
                ->route('cookbook.my-cookbooks')
                ->with('error', 'Esse livro consta em uma publicação');
        }

        $cookbook_disabled = $cookBook->delete();

        if ($cookbook_disabled) {
            return redirect()
                ->route('cookbook.my-cookbooks')
                ->with('success', 'Livro de receitas excluído com sucesso');
        }

        return redirect()
            ->route('cookbook.my-cookbooks')
            ->with('error', 'Erro na exclusão do livro de receitas');
    }

    public function render(): View
    {
        return view('livewire.cook-book.my-cook-books.form-delete');
    }
}
