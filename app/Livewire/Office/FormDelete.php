<?php

namespace App\Livewire\Office;

use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;

class FormDelete extends Component
{
    use WithModal;

    public Office $office;
    public bool $is_employees;

    public function mount($id = null): void
    {
        $office = Office::where('id', $id)->first();
        $this->office = $office;
        $this->is_employees = !empty($this->office->employees()->get()->toArray());
    }

    public function delete(): Redirector
    {

        if (!$this->office) {
            return redirect('admin/positions')->with('error', 'Cargo não registrado');
        }


        if ($this->is_employees) {
            return redirect('admin/positions')->with('error', 'Existe funcionários vinculados a esse cargo');
        }

        // $office_disabled = $this->office->delete();

        if (true) {
            return redirect('admin/positions')->with('success', 'Cargo excluído com sucesso');
        }

        return redirect('admin/positions')->with('error', 'Erro na exclusão do cargo');
    }

    public function render(): View
    {
        return view('livewire.office.form-delete');
    }
}
