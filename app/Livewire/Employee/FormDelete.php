<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;

class FormDelete extends Component
{
    use WithModal;

    public bool $is_cook_books;

    public bool $is_revenues;

    public bool $is_tasting_revenues;

    public Employee $employee;

    public function mount($id = null): void
    {
        $employee = Employee::find($id);

        $this->employee = $employee;
        $this->is_cook_books = !empty($this->employee->cookbooks()->get()->toArray());
        $this->is_revenues = !empty($this->employee->revenues()->get()->toArray());
        $this->is_tasting_revenues = !empty($this->employee->tastingRevenues()->get()->toArray());
    }

    public function delete(Employee $employee): Redirector
    {

        if (!$employee) {
            return redirect('admin/employees')->with('error', 'Funcionário não registrado');
        }

        if ($this->is_cook_books) {
            return redirect('admin/employees')
                ->with('error', 'Existem livros de receitas vinculados a esse editor');
        } else if ($this->is_revenues) {
            return redirect('admin/employees')
                ->with('error', 'Existem receitas vinculadas a esse cozinheiro');
        } else if ($this->is_tasting_revenues) {
            return redirect('admin/employees')
                ->with('error', 'Existem degustações vinculadas a esse degustador');
        }

        $employee_disabled = $employee->delete();

        if ($employee_disabled) {
            return redirect('admin/employees')->with('success', 'Funcionário excluído com sucesso');
        }

        return redirect('admin/employees')->with('error', 'Erro na exclusão do funcionário');
    }

    public function render(): View
    {
        return view('livewire.employee.form-delete');
    }
}
