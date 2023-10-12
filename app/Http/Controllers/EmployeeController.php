<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::select("select * from employees");
        return view("employees", compact('employees'));
    }

    public function model()
    {
        dd(Employee::find(100));
        foreach (Employee::all() as $key => $value) {
            echo $value->EMPLOYEE_ID . ' -  ' . $value->LAST_NAME . "<br>";
        }
    }
}
