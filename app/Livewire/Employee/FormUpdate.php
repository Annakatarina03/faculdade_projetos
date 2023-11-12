<?php

namespace App\Livewire\Employee;

use App\Helpers\Formatter;
use App\Models\Employee;
use App\Models\Office;
use App\Traits\WithModal;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Spatie\Permission\Models\Role;

class FormUpdate extends Component
{
    use WithModal;

    public string $name;

    public string $cpf;

    public string $username;

    public array $employee_roles;

    public string $office;

    public string $wage;

    public string $date_entry;

    public string $password;

    public bool $status;

    public Employee $employee;


    public function rules(): array
    {
        return [

            'name' => ['required'],
            'username' => ['required'],
            'cpf' => ['required', Rule::unique('employees', 'cpf')->ignore($this->employee->id), 'min:11'],
            'wage' => [
                'required', function ($attribute, $value, Closure $fail) {
                    $value = str_replace(',', '.', $value);
                    if ($value <= 0.00) {
                        $fail('Valor inválido');
                    }
                },
            ],
            'date_entry' => ['before_or_equal:today'],
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
            'name.required' => 'Campo obrigatório',
            'username.required' => 'Campo obrigatório',
            'cpf.required' => 'Campo obrigatório',
            'cpf.unique' => 'CPF já registrado',
            'cpf.min' => 'CPF inválido',
            'wage.required' => 'Campo obrigatório',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres'
        ];
    }


    public function update(): RedirectResponse|Redirector
    {
        $this->validate();
        $employee_office = Office::firstWhere('name', $this->office);

        $this->employee->office()->associate($employee_office);
        $this->employee->syncRoles($this->employee_roles);

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

    public function mount(int $id = null)
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
        $this->employee_roles = $employee->roles->pluck('name')->toArray();
        $this->office = $employee->office ? $employee->office->name : $this->office;
        $this->wage = str_replace('.', ',', $employee->wage);
        $this->date_entry = $employee->date_entry;
        $this->status = $employee->status;
        $this->password = '';
    }

    public function render(): View
    {
        $positions = Office::all();
        $employee = $this->employee;
        $roles = Role::all();

        return view('livewire.employee.form-update', compact(['positions', 'employee', 'roles']));
    }
}
