<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\Office;
use App\Traits\WithModal;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithModal;

    public Employee $admin_employee;

    public string $search = '';

    public function mount(): void
    {
        $this->admin_employee = Employee::find(1);
    }

    public function render()
    {
        $positions = Office::all()->sortBy('name');

        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $employees
         */

        $employees = Employee::where('name', 'like', "%$this->search%")
            ->orderBy('name')
            ->paginate(5)
            ->onEachSide(0);

        return view('livewire.employee.index', compact(['employees', 'positions']));
    }
}
