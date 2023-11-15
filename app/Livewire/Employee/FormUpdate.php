<?php

namespace App\Livewire\Employee;

use App\Helpers\Formatter;
use App\Models\Employee;
use App\Models\Office;
use App\Models\Restaurant;
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

    public mixed $employees_restaurant;

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
            'employees_restaurant.*.restaurant' => ['required', 'distinct'],
            'employees_restaurant.*.date_entry' => ['required', 'before_or_equal:today'],
            'employees_restaurant.*.resignation_date' => ['before_or_equal:today']
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
            'password.min' => 'A senha deve ter no mínimo 8 caracteres',
            'employees_restaurant.*.restaurant' => ['required', 'distinct'],
            'employees_restaurant.*.date_entry' => ['required', 'before_or_equal:today'],
            'employees_restaurant.*.resignation_date' => ['before_or_equal:today'],
            'employees_restaurant.*.restaurant.required' => 'Campo obrigatório',
            'employees_restaurant.*.restaurant.distinct' => 'Restaurante já adicionado',
            'employees_restaurant.*.date_entry.required' => 'Campo obrigatório',
            'employees_restaurant.*.date_entry.before_or_equal' => 'Data inválida',
            'employees_restaurant.*.resignation_date.before_or_equal' => 'Data inválida',
        ];
    }

    public function add(): void
    {
        $this->employees_restaurant[] =
            [
                'restaurant' => '',
                'date_entry' => '',
                'resignation_date' => '',
            ];
    }

    public function del(int $index): void
    {
        unset($this->employees_restaurant[$index]);
        $this->employees_restaurant = array_values($this->employees_restaurant);
        $this->resetValidation("employees_restaurant.$index");
    }

    public function update(): RedirectResponse|Redirector
    {
        $this->validate();

        /**
         * @var Office $employee_office
         */

        $employee_office = Office::firstWhere('name', $this->office);

        $this->employee->office()->associate($employee_office);

        $this->employee->syncRoles($this->employee_roles);

        $employees_restaurant = collect($this->employees_restaurant)
            ->map(fn ($employee_restaurant) =>
            [
                'restaurant_id' => Restaurant::firstWhere('name', $employee_restaurant['restaurant'])->id,
                'date_entry' =>  $employee_restaurant['date_entry'],
                'resignation_date' =>  $employee_restaurant['resignation_date'] ? $employee_restaurant['resignation_date'] : null
            ])->pluck(null, 'restaurant_id');

        $this->employee->restaurants()->sync($employees_restaurant);

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

        $this->employee = Employee::find($id);

        if (!$this->employee) {
            return redirect()
                ->route('admin.employees.index')
                ->with('error', 'Funcionário não registrado');
        }
        $this->name = $this->employee->name;
        $this->cpf = $this->employee->cpf;
        $this->username = $this->employee->username;
        $this->employee_roles = $this->employee->roles->pluck('name')->toArray();
        $this->office = $this->employee->office ? $this->employee->office->name : $this->office;
        $this->wage = str_replace('.', ',', $this->employee->wage);
        $this->date_entry = $this->employee->date_entry;
        $this->status = $this->employee->status;
        $this->password = '';
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
        $roles = Role::all()->sortBy('name');
        $restaurants = Restaurant::all()->sortBy('name');

        return view('livewire.employee.form-update', compact(['positions', 'roles', 'restaurants']));
    }
}
