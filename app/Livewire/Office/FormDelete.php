<?php

namespace App\Livewire\Office;

use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormDelete extends Component
{
    use WithModal;

    public bool $has_employees;

    public Office $office;

    public function mount(int $id): void
    {
        $this->office = Office::find($id);
        $this->has_employees = !$this->office->employees()->get()->isEmpty();
    }

    public function delete(Office $office): RedirectResponse|Redirector
    {

        if (!$office) {
            return redirect()
                ->route('admin.positions.index')
                ->with('error', 'Cargo não registrado');
        }


        if ($this->has_employees) {
            return redirect()
                ->route('admin.positions.index')
                ->with('error', 'Existe funcionários vinculados a esse cargo');
        }


        $delete_office = $office->delete();

        if ($delete_office) {
            return redirect()
                ->route('admin.positions.index')
                ->with('success', 'Cargo excluído com sucesso');
        }

        return redirect()
            ->route('admin.positions.index')
            ->with('error', 'Erro na exclusão do cargo');
    }

    public function render(): View
    {
        return view('livewire.office.form-delete');
    }
}
