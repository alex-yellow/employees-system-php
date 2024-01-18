<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Profession;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(5);
        return view('admin.index', compact('employees'));
    }

    protected function getProfessionsForDepartment($departmentId)
    {
        $department = Department::find($departmentId);

        if ($department) {
            return $department->professions;
        }

        return collect(); // Если отдел не найден, возвращаем пустую коллекцию
    }

    public function createOne()
    {
        $departments = Department::all();
        return view('admin.createOne', compact('departments'));
    }

    public function createTwo(Request $request)
    {
        $departments = Department::all();
        $selectedDepartment = $request->input('department_id');

        $department = Department::find($selectedDepartment);

        // Проверяем наличие отдела и профессий
        if ($department) {
            $professions = $department->professions;
        } else {
            $professions = [];
        }

        return view('admin.createTwo', compact('departments', 'professions', 'selectedDepartment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Правила валидации для создания работника
            'name' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
            'profession_id' => 'required|exists:professions,id',
        ]);

        Employee::create([
            'name' => $request->name,
            'salary' => $request->salary,
            'department_id' => $request->department_id,
            'profession_id' => $request->profession_id,
        ]);

        return redirect()->route('admin.index')->with('success', 'Employee created successfully!');
    }

    public function editOne(Employee $employee)
{
    $departments = Department::all();
    return view('admin.editOne', compact('employee', 'departments'));
}

public function editTwo(Request $request, Employee $employee)
{
    $departments = Department::all();
    $selectedDepartment = $request->input('department_id');
    $professions = $this->getProfessionsForDepartment($selectedDepartment);

    return view('admin.editTwo', compact('employee', 'departments', 'professions', 'selectedDepartment'));
}

public function update(Request $request, Employee $employee)
{
    $request->validate([
        // Правила валидации для обновления данных работника
        'name' => 'required|string|max:255',
        'salary' => 'required|numeric',
        'department_id' => 'required|exists:departments,id',
        'profession_id' => 'required|exists:professions,id',
    ]);

    $employee->update([
        'name' => $request->name,
        'salary' => $request->salary,
        'department_id' => $request->department_id,
        'profession_id' => $request->profession_id,
    ]);

    return redirect()->route('admin.index')->with('success', 'Employee updated successfully!');
}

    public function delete(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('admin.index')->with('success', 'Employee deleted successfully!');
    }
}
