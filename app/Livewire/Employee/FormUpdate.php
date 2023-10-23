<?php

namespace App\Livewire\Employee;

use App\Helpers\Formatter;
use App\Models\Employee;
use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Rule as RuleLivewire;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Spatie\Permission\Models\Role;

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

    public array $employeeRoles;

    public ?string $office = '';

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


    public function update(): RedirectResponse|Redirector
    {
        $this->validate();
        $employee_office = Office::firstWhere('name', $this->office);

        $this->employee->office()->associate($employee_office);
        $this->employee->syncRoles($this->employeeRoles);

        $updated_employee = $this->employee->update([
            'name' => $this->name,
            'cpf' => Formatter::clean($this->cpf),
            'username' => $this->username,
            'wage' => str_replace(',', '.', $this->wage),
            'status' => $this->employee->status,
            'date_entry' => $this->date_entry,
            'password' => $this->password ? Hash::make($this->password) : $this->employee->password,
            'status' => $this->status
        ]);


        if ($updated_employee) {
            return redirect()
                ->route('admin.employees.index')
                ->with('success', 'Funcionário atualizado com sucesso');
        }

        return redirect()
            ->route('admin.employees.index')
            ->with('error', 'Erro na atualização do funcionário');
    }

    public function mount($id = null)
    {

        $employee = Employee::find($id);

        if (!$employee) {
            return redirect()
                ->route('admin.employees.index')
                ->with('error', 'Funcionário não registrado');
        }
        $this->employee = $employee;
        $this->name = $employee->name;
        $this->cpf = $employee->cpf;
        $this->username = $employee->username;
        $this->employeeRoles = $employee->roles->pluck('name')->toArray();
        $this->office = $employee->office ? $employee->office->name : $this->office;
        $this->wage = str_replace('.', ',', $employee->wage);
        $this->date_entry = $employee->date_entry;
        $this->status = $employee->status;
    }

    public function render(): View
    {
        $positions = Office::all();
        $employee = $this->employee;
        $roles = Role::all();

        return view('livewire.employee.form-update', compact(['positions', 'employee', 'roles']));
    }
}
