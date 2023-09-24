<?php

namespace App\Livewire\Employee;

use App\Helpers\Formatter;
use App\Models\Employee;
use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule as RuleLivewire;
use Livewire\Component;

class FormUpdate extends Component
{
    use WithModal;

    #[RuleLivewire(rule: 'required', message: [
        'required' => 'Campo obrigatório'
    ])]
    public string $name;

    #[RuleLivewire(rule: 'required', message: [
        'required' => 'Campo obrigatório',
    ])]
    public string $cpf;

    #[RuleLivewire(rule: 'required', message: [
        'required' => 'Campo obrigatório',
    ])]
    public string $username;

    #[RuleLivewire(rule: 'required', message: [
        'required' => 'Campo obrigatório'
    ])]
    public string $office;

    #[RuleLivewire(rule: 'required', message: [
        'required' => 'Campo obrigatório'
    ])]
    public string $wage;

    #[RuleLivewire(rule: 'required|before_or_equal:today', message: [
        'required' => 'Campo obrigatório',
        'before_or_equal' => 'Data inválida'
    ])]
    public $date_entry;

    public $password = null;

    public Employee $employee;


    public function rules(): array
    {
        return [
            'name' => ['required'],
            'password' =>
            [
                function ($attribute, $value, $fail) {
                    if (!is_null($value)) {
                        $this->validate([$attribute => 'min:8']);
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo obrigatório',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres'
        ];
    }


    public function update()
    {

        $this->validate();

        $employee_office = Office::where('description', $this->office)->first();
        $this->employee->office()->associate($employee_office);

        $updated_employee = $this->employee->update([
            'name' => $this->name,
            'cpf' => Formatter::clean($this->cpf),
            'username' => $this->username,
            'wage' => $this->wage,
            'status' => $this->employee->status,
            'date_entry' => $this->date_entry,
            'password' => $this->password ? Hash::make($this->password) : $this->employee->password
        ]);

        if ($updated_employee) {
            return redirect('admin/employees')->with('success', 'Registro atualizado com sucesso');
        }

        return redirect('admin/employees')->with('error', 'Erro na atualização do registro');
    }

    public function mount($id = null)
    {

        $employee = Employee::where('id', $id)->first();

        if (!$employee) {
            return redirect('admin/employees')->with('error', 'Funcionário não existe');
        }

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
        return view('livewire.employee.form-update', compact(['positions', 'employee']));
    }
}
