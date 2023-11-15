<?php

namespace App\Livewire\Employee;

use App\Models\Office;
use App\Models\Restaurant;
use App\Traits\WithModal;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Spatie\Permission\Models\Role;

class FormCreate extends Component
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

    public string $password_confirmation;

    public array $employees_restaurant = [];

    public function rules(): array
    {
        return
            [
                'name' => ['required'],
                'cpf' => ['required', 'unique:employees,cpf', 'min:11'],
                'username' => ['required', 'unique:employees,username'],
                'office' => ['required'],
                'wage' => [
                    'required', function ($attribute, $value, Closure $fail) {
                        $value = str_replace(',', '.', $value);
                        if ($value <= 0.00) {
                            $fail('Valor inválido');
                        }
                    },
                ],                'date_entry' => ['required', 'before_or_equal:today'],
                'password' => ['required', 'min:8', 'same:password_confirmation'],
                'password_confirmation' => ['required', 'same:password'],
                'employees_restaurant.*.restaurant' => ['required', 'distinct'],
                'employees_restaurant.*.date_entry' => ['required', 'before_or_equal:today'],
                'employees_restaurant.*.resignation_date' => ['before_or_equal:today']
            ];
    }

    public function messages(): array
    {
        return
            [
                'name.required' => 'Campo obrigatório',
                'cpf.required' => 'Campo obrigatório',
                'cpf.unique' => 'CPF já registrado',
                'cpf.min' => 'CPF inválido',
                'username.required' => 'Campo obrigatório',
                'username.unique' => 'Nome de usuário já registrado',
                'office.required' => 'Campo obrigatório',
                'wage.required' => 'Campo obrigatório',
                'date_entry.required' => 'Campo obrigatório',
                'name.before_or_equal' => 'Data inválida',
                'password.required' => 'Campo obrigatório',
                'password.min' => 'Senha deve conter no mínimo 8 caracteres',
                'password.same' => 'Senha não se correspodem',
                'password_confirmation.required' => 'Campo obrigatório',
                'password_confirmation.same' => 'Senha não se correspodem',
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

    public function mount(): void
    {
        $this->office = '';
        $this->employees_restaurant = [];
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        /**
         * @var Office $office
         */

        $office = Office::firstWhere('name', $this->office);

        /**
         * @var Employee $employee
         */


        $employee = $office->employees()->create([
            'name' => $this->name,
            'cpf' => $this->cpf,
            'username' => $this->username,
            'wage' => str_replace(',', '.', $this->wage),
            'date_entry' => $this->date_entry,
            'password' => Hash::make($this->password),
        ]);

        $employees_restaurant = collect($this->employees_restaurant)
            ->map(fn ($employee_restaurant) =>
            [
                'restaurant_id' => Restaurant::firstWhere('name', $employee_restaurant['restaurant'])->id,
                'date_entry' =>  $employee_restaurant['date_entry'],
                'resignation_date' =>  $employee_restaurant['resignation_date'] ? $employee_restaurant['resignation_date'] : null
            ]);

        $employee->restaurants()->attach($employees_restaurant);

        if ($this->employee_roles) {
            $employee->assignRole($this->employee_roles);
        }

        if ($employee) {
            return redirect()
                ->route('admin.employees.index')
                ->with('success', 'Funcionário registrado com sucesso');
        }

        return redirect()
            ->route('admin.employees.index')
            ->with('error', 'Erro no registro do funcionário');
    }

    public function render(): View
    {
        $positions = Office::all()->sortBy('name');
        $roles = Role::all()->sortBy('name');
        $restaurants = Restaurant::all()->sortBy('name');

        return view('livewire.employee.form-create', compact(['positions', 'roles', 'restaurants']));
    }
}
