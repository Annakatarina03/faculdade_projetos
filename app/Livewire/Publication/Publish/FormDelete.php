<?php

namespace App\Livewire\Publication\Publish;

use App\Models\CookBook;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FormDelete extends Component
{
    use WithModal;

    public CookBook $cookbook;

    public function mount(int $id = null): void
    {
        $this->cookbook = CookBook::find($id);
    }

    public function delete(CookBook $cookbook): RedirectResponse|Redirector
    {

        if (!$cookbook) {
            return redirect()
                ->route('publications.my-publications.cookbooks')
                ->with('error', 'Cargo não registrado');
        }

        $revenues = $cookbook->revenues()->get();
        $delete_post = $cookbook->revenues()->detach($revenues);


        if ($delete_post) {
            return redirect()
                ->route('publications.my-publications.cookbooks')
                ->with('success', 'Cargo excluído com sucesso');
        }

        return redirect()
            ->route('publications.my-publications.cookbooks')
            ->with('error', 'Erro na exclusão do cargo');
    }

    public function render(): View
    {
        return view('livewire.publication.publish.form-delete');
    }
}
