<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormDelete extends Component
{
    use WithModal;

    public bool $has_cook_books;

    public bool $has_revenues;

    public bool $has_tasting_revenues;

    public Employee $employee;

    public function mount(int $id = null): void
    {

        $this->employee = Employee::find($id);
        $this->has_cook_books = !$this->employee->cookbooks()->get()->isEmpty();
        $this->has_revenues = !$this->employee->revenues()->get()->isEmpty();
        $this->has_tasting_revenues = !$this->employee->tastingRevenues()->get()->isEmpty();
    }

    public function delete(Employee $employee): RedirectResponse|Redirector
    {

        if (!$employee) {
            return redirect()
                ->route('admin.employees.index')
                ->with('error', 'Funcionário não registrado');
        }

        if ($this->has_cook_books) {
            return redirect()
                ->route('admin.employees.index')
                ->with('error', 'Existem livros de receitas vinculados a esse editor');
        } else if ($this->has_revenues) {
            return redirect()
                ->route('admin.employees.index')
                ->with('error', 'Existem receitas vinculadas a esse cozinheiro');
        } else if ($this->has_tasting_revenues) {
            return redirect()
                ->route('admin.employees.index')
                ->with('error', 'Existem degustações vinculadas a esse degustador');
        }

        $delete_employee = $employee->delete();

        if ($delete_employee) {
            return redirect()
                ->route('admin.employees.index')
                ->with('success', 'Funcionário excluído com sucesso');
        }

        return redirect()
            ->route('admin.employees.index')
            ->with('error', 'Erro na exclusão do funcionário');
    }

    public function render(): View
    {
        return view('livewire.employee.form-delete');
    }
}
