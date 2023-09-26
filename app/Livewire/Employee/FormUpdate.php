<?php

namespace App\Livewire\Employee;

use App\Helpers\Formatter;
use App\Models\Employee;
use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Rule as RuleLivewire;
use Livewire\Component;

class FormUpdate extends Component
{
    use WithModal;

    #[RuleLivewire(rule: 'required', message: [
        'required' => 'Campo obrigatório'
    ])]
    public string $name;

    public string $cpf;

    #[RuleLivewire(rule: 'required', message: [
        'required' => 'Campo obrigatório',
    ])]
    public string $username;

    public string $office = '';

    #[RuleLivewire(rule: 'required', message: [
        'required' => 'Campo obrigatório'
    ])]
    public string $wage;

    #[RuleLivewire(rule: 'required|before_or_equal:today', message: [
        'required' => 'Campo obrigatório',
        'before_or_equal' => 'Data inválida'
    ])]
    public string $date_entry;

    public string $password = '';

    public bool $status;

    public Employee $employee;


    public function rules(): array
    {
        return [
            'cpf' => ['required', Rule::unique('employees', 'cpf')->ignore($this->employee->id), 'min:11'],
            'password' =>
            [
                function ($attribute, $value, $fail) {
                    if (!empty($value)) {
                        $this->validate([$attribute => 'min:8']);
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.required' => 'Campo obrigatório',
            'cpf.unique' => 'CPF já registrado',
            'cpf.min' => 'CPF inválido',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres'
        ];
    }


    public function update(): Redirector
    {
        $this->validate();

        $employee_office = Office::where('name', $this->office)->first();
        $this->employee->office()->associate($employee_office);

        $updated_employee = $this->employee->update([
            'name' => $this->name,
            'cpf' => Formatter::clean($this->cpf),
            'username' => $this->username,
            'wage' => $this->wage,
            'status' => $this->employee->status,
            'date_entry' => $this->date_entry,
            'password' => $this->password ? Hash::make($this->password) : $this->employee->password,
            'status' => $this->status
        ]);

        if ($updated_employee) {
            return redirect('admin/employees')->with('success', 'Funcionário atualizado com sucesso');
        }

        return redirect('admin/employees')->with('error', 'Erro na atualização do funcionário');
    }

    public function mount($id = null)
    {

        $employee = Employee::where('id', $id)->first();

        if (!$employee) {
            return redirect('admin/employees')->with('error', 'Funcionário não registrado');
        }

        $this->employee = $employee;
        $this->name = $employee->name;
        $this->cpf = $employee->cpf;
        $this->username = $employee->username;
        $this->office = $employee->office ? $employee->office->name : $this->office;
        $this->wage = $employee->wage;
        $this->date_entry = $employee->date_entry;
        $this->status = $employee->status;
    }

    public function render(): View
    {
        $positions = Office::all();
        $employee = $this->employee;
        return view('livewire.employee.form-update', compact(['positions', 'employee']));
    }
}
