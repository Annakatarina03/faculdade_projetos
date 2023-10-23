<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class FormView extends Component
{

    use WithModal;

    public string $name;

    public string $cpf;

    public string $username;

    public Collection $employeeRoles;

    public ?string $office = '';

    public string $wage;

    public string $date_entry;

    public bool $status;

    public Employee $employee;

    public function mount($id = null): void
    {
        $employee = Employee::firstWhere('id', $id);
        $this->employee = $employee;
        $this->name = $employee->name;
        $this->cpf = $employee->cpf;
        $this->username = $employee->username;
        $this->employeeRoles = $employee->roles;
        $this->office = $employee->office ? $employee->office->name : $this->office;
        $this->wage = str_replace('.', ',', $employee->wage);
        $this->date_entry = $employee->date_entry;
        $this->status = $employee->status;
    }

    public function render(): View
    {
        $positions = Office::all();
        $employee = $this->employee;

        return view('livewire.employee.form-view', compact(['positions', 'employee']));
    }
}
