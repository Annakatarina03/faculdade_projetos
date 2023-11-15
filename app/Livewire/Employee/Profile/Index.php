<?php

namespace App\Livewire\Employee\Profile;

use App\Models\Employee;
use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class Index extends Component
{
    use WithModal;

    public string $username;

    public string $name;

    public string $cpf;

    public ?string $office = '';

    public ?string $fantasy_name = null;

    public Employee $employee;

    public bool $is_chef;

    public function mount(int $id = null): void
    {

        $this->employee = $employee = Employee::find($id);
        $this->username = $employee->username;
        $this->name = $employee->name;
        $this->fantasy_name = $employee->fantasy_name;
        $this->cpf = $employee->cpf;
        $this->office = $employee->office ? $employee->office->name : $this->office;
        $this->is_chef = $employee->office->slug  === 'chefe-de-cozinha' ? true : false;
    }

    public function update(): RedirectResponse|Redirector
    {

        $updated_employee = $this->employee->update([
            'fantasy_name' => $this->fantasy_name ? $this->fantasy_name : null,
        ]);

        if ($updated_employee) {
            return redirect()
                ->route('profile')
                ->with('success', 'Perfil atualizado com sucesso');
        }

        return redirect()
            ->route('profile')
            ->with('error', 'Erro na atualização do perfil');
    }

    public function exit(): RedirectResponse
    {
        return redirect()
            ->back();
    }

    public function render(): View
    {
        $positions = Office::all()->sortBy('name');
        return view('livewire.employee.profile.index', compact(['positions']));
    }
}
