<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Office;
use Livewire\Component;

class UserTable extends Component
{
    public $selectedId;
    public $firstName;

    public function render()
    {
        $positions = Office::all();
        $employees = Employee::paginate(5)->onEachSide(0);
        return view('livewire.user-table', compact(['employees', 'positions']));
    }


    public function changeView($id)
    {
        $this->selectedId = $id;
    }
}
