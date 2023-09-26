<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\Office;
use App\Traits\WithModal;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithModal;

    public string $search = '';

    public function render()
    {
        $positions = Office::all();
        $employees = Employee::where([['name', 'like', "%$this->search%"]])
            ->orderBy('name')
            ->paginate(5)->onEachSide(0);

        return view('livewire.employee.index', compact(['employees', 'positions']));
    }
}
