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

    public Office $office;
    public bool $is_employees;

    public function mount($id): void
    {
        $this->office = Office::find($id);
        $this->is_employees = !empty($this->office->employees()->get()->toArray());
    }

    public function delete(Office $office): RedirectResponse|Redirector
    {

        if (!$office) {
            return redirect()
                ->route('admin.positions.index')
                ->with('error', 'Cargo não registrado');
        }


        if ($this->is_employees) {
            return redirect()
                ->route('admin.positions.index')
                ->with('error', 'Existe funcionários vinculados a esse cargo');
        }


        $office_disabled = $office->delete();

        if ($office_disabled) {
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
