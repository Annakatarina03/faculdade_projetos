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

    public Employee $employee;

    public function mount($id = null): void
    {
        $employee = Employee::find($id);

        $this->employee = $employee;
    }

    public function delete(Employee $employee): Redirector
    {

        if (!$employee) {
            return redirect('admin/employees')->with('error', 'Funcionário não registrado');
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
