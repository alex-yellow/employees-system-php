<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private function checkUserAuthentication()
    {
        $user = session('user');

        if (!$user) {
            redirect('/login')->send();
            exit();
        }

        return $user;
    }


    public function index()
    {

        $user = $this->checkUserAuthentication();

        $employees = Employee::paginate(5);

        return view('employee.index', compact('employees'));
    }
}
