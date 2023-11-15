<?php

namespace App\Livewire\Employee\Profile;

use App\Models\Employee;
use App\Traits\WithModal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class FormUpdate extends Component
{
    use WithModal;

    public ?string $fantasy_name;

    public Employee $employee;

    public function update(): RedirectResponse|Redirector
    {

        $updated_employee = $this->employee->update([
            'fantasy_name' => $this->fantasy_name,
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

    public function mount(int $id = null)
    {

        $this->employee = Employee::find($id);

        if (!$this->employee) {
            return redirect()
                ->route('profile')
                ->with('error', 'Funcionário não registrado');
        }
        $this->fantasy_name = $this->employee->fantasy_name;
    }

    public function render(): View
    {
        return view('livewire.employee.profile.form-update', compact(['employee']));
    }
}
