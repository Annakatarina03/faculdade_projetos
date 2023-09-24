<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\Office;
use App\Traits\WithModal;
use Livewire\Component;

class FormView extends Component
{

    use WithModal;

    public string $name;

    public string $cpf;

    public string $username;

    public string $office;

    public string $wage;

    public $date_entry;

    public $employee;

    public function mount($id = null)
    {
        $employee = Employee::where('id', $id)->first();

        $this->employee = $employee;
        $this->name = $employee->name;
        $this->cpf = $employee->cpf;
        $this->username = $employee->username;
        $this->office = $employee->office->description;
        $this->wage = $employee->wage;
        $this->date_entry = $employee->date_entry;
    }

    public function render()
    {
        $positions = Office::all();
        $employee = $this->employee;
        return view('livewire.employee.form-view', compact(['positions', 'employee']));
    }
}
