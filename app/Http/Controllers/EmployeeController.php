<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Office;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
