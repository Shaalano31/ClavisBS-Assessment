<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Show all employees
    public function index() {
        return view('employees.index' ,[
            'employees' => Employee::latest()->get()
        ]);
    }

    // Show Create Form
    public function create() {
        return view('employees.create');
    }

    // Store Employee detail
    public function store(Request $request, StoreEmployee $validate) {

        $formFields = $validate->all();

        Employee::create($formFields);

        return redirect('/employees');
    }

    // Show Edit Form
    public function edit(Employee $employee) {
        return view('employees.edit', ['employee' => $employee]);
    }

    // Update Listing Data
    public function update(Employee $employee, StoreEmployee $validate) {

        $formFields = $validate->all();

        $employee->update($formFields);

        return redirect('/employees');
    }

    // Delete Employee
    public function destroy(Employee $employee) {

        $employee->delete();
        return redirect('/employees');
    }
}
