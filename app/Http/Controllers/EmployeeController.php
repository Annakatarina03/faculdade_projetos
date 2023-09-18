<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employee;
use App\Models\Office;
use Formatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->search;
        $positions = Office::all();

        if (isset($search)) {
            $employees = Employee::where([
                ['status', true],
                ['name', 'like', "%$search%"]
            ])
                ->orderBy('name')
                ->paginate(5)->onEachSide(0);
        } else {
            $employees = Employee::where('status', true)
                ->orderBy('name')
                ->paginate(5)->onEachSide(0);
        }

        return view('senac.employee.employees', compact(['employees', 'positions']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        $request->validated();

        $office = Office::where('slug', $request->office)->first();

        $employee = $office->employees()->create([
            'name' => $request->name,
            'cpf' => Formatter::clean($request->cpf),
            'username' => $request->username,
            'wage' => $request->wage,
            'date_entry' => $request->date_entry,
            'password' => Hash::make($request->password),
        ]);

        if ($employee) {
            return redirect('admin/employees')->with('success', 'Funcionário criado com sucesso');
        }

        return redirect('admin/employees')->with('error', 'Erro na criação do funcionário');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $positions = Office::all();
        return view('senac.employee.employee-edit', compact(['employee', 'positions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $request->validated();

        $employee_office = Office::where('slug', $request->office)->first();
        $employee->office()->associate($employee_office);

        $updated_employee = $employee->update([
            'name' => $request->name,
            'cpf' => Formatter::clean($request->cpf),
            'username' => $request->username,
            'office_id' => $request->office,
            'wage' => $request->wage,
            'status' => $employee->status,
            'date_entry' => $request->date_entry,
            'password' => $request->password ? Hash::make($request->password) : $employee->password
        ]);

        if ($updated_employee) {
            return redirect('admin/employees')->with('success', 'Registro atualizado com sucesso');
        }

        return redirect('admin/employees')->with('error', 'Erro na atualização do registro');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee_disabled = $employee->delete();

        if ($employee_disabled) {
            return redirect('admin/employees')->with('success', 'Registro apagado com sucesso');
        }

        return redirect('admin/employees')->with('error', 'Erro na atualização do registro');
    }
}
