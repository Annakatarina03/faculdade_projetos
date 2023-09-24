<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Traits\WithModal;
use Livewire\Component;

class FormDelete extends Component
{
    use WithModal;

    public $employee;

    public function mount($id = null)
    {
        $employee = Employee::where('id', $id)->first();

        $this->employee = $employee;
    }

    public function delete()
    {

        if (!$this->employee) {
            return redirect('admin/employees')->with('error', 'Funcionário não existe');
        }
        $employee_disabled = $this->employee->delete();

        if ($employee_disabled) {
            return redirect('admin/employees')->with('success', 'Registro apagado com sucesso');
        }

        return redirect('admin/employees')->with('error', 'Erro na atualização do registro');
    }

    public function render()
    {
        return view('livewire.employee.form-delete');
    }
}
