<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\Office;
use App\Models\Restaurant;
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

    public Collection $employee_roles;

    public ?string $office = '';

    public string $wage;

    public string $date_entry;

    public bool $status;

    public mixed $employees_restaurant;

    public Employee $employee;

    public function mount(int $id = null): void
    {

        $this->employee = Employee::find($id);

        $this->name = $this->employee->name;
        $this->cpf = $this->employee->cpf;
        $this->username = $this->employee->username;
        $this->employee_roles = $this->employee->roles;
        $this->office = $this->employee->office ? $this->employee->office->name : $this->office;
        $this->wage = str_replace('.', ',', $this->employee->wage);
        $this->date_entry = $this->employee->date_entry;
        $this->status = $this->employee->status;
        $this->employees_restaurant = $this->employee->restaurants
            ->pluck('pivot')
            ->map(
                fn ($employee_restaurant) =>
                [
                    'restaurant' => Restaurant::find($employee_restaurant->restaurant_id)->name,
                    'date_entry' => $employee_restaurant->date_entry,
                    'resignation_date' => $employee_restaurant->resignation_date ? $employee_restaurant->resignation_date : ''
                ]
            )->toArray();
    }

    public function render(): View
    {
        $positions = Office::all()->sortBy('name');
        $restaurants = Restaurant::all()->sortBy('name');

        return view('livewire.employee.form-view', compact(['positions', 'restaurants']));
    }
}
