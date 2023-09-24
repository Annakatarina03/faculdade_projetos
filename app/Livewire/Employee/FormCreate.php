<?php

namespace App\Livewire\Employee;

use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Rule as RuleLivewire;

class FormCreate extends Component
{
    use WithModal;

    #[RuleLivewire(rule: 'required', message: [
        'name.required' => 'Campo obrigatório'
    ])]
    public string $name;

    #[RuleLivewire(rule: 'required|unique:employees,cpf', message: [
        'cpf.required' => 'Campo obrigatório',
        'cpf.unique' => 'CPF já registrado'
    ])]
    public string $cpf;

    #[RuleLivewire(rule: 'required|unique:employees,username', message: [
        'username.required' => 'Campo obrigatório',
        'username.unique' => 'Nome de usuário já registrado'
    ])]
    public string $username;

    #[RuleLivewire(rule: 'required_if:office,disabled', message: [
        'office.required' => 'Campo obrigatório'
    ])]
    public $office = "disabled";

    #[RuleLivewire(rule: 'required', message: [
        'wage.required' => 'Campo obrigatório'
    ])]
    public string $wage;

    #[RuleLivewire(rule: 'required|before_or_equal:today', message: [
        'date_entry.required' => 'Campo obrigatório',
        'date_entry.before_or_equal' => 'Data inválida'
    ])]
    public $date_entry;

    #[RuleLivewire(rule: 'required|min:8|same:password_confirmation', message: [
        'password.required' => 'Campo obrigatório',
        'password.min' => 'Senha deve ter no mínimo 8 caracteres',
        'password.same' => 'Senhas não se correspondem'
    ])]
    public string $password;

    #[RuleLivewire(rule: 'required|same:password', message: [
        'password_confirmation.required' => 'Campo obrigatório',
        'password_confirmation.same' => 'Senhas não se correspondem'
    ])]
    public string $password_confirmation;


    public function create()
    {
        $this->validate();

        $office = Office::where('description', $this->office)->first();
        $employee = $office->employees()->create([
            'name' => $this->name,
            'cpf' => $this->cpf,
            'username' => $this->username,
            'wage' => $this->wage,
            'date_entry' => $this->date_entry,
            'password' => Hash::make($this->password),
        ]);

        if ($employee) {
            return redirect('admin/employees')->with('success', 'Funcionário criado com sucesso');
        }

        return redirect('admin/employees')->with('error', 'Erro na criação do funcionário');
    }

    public function render()
    {
        $positions = Office::all();
        return view('livewire.employee.form-create', compact(['positions']));
    }
}