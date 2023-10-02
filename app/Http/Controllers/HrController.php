<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HrController extends Controller
{
    public function index()
    {
        // $emps = DB::select("select * from employees");
        // dd($emps);
        // dump($emps);
        // echo "Test";
        // var_dump($emps);
        // $emps = DB::table("employees")->get();
        // $emps = DB::table("employees")->get("FIRST_NAME");

        $emps = DB::table("employees")->where("EMPLOYEE_ID", "=", 100)->get();
        $emps = DB::table("employees")->where("EMPLOYEE_ID", "=", 100)->first();
        $emps = DB::table("employees")->pluck("FIRST_NAME", "EMPLOYEE_ID")->toArray();

        $emps = DB::table("employees")->count();
        $emps = DB::table("employees")->count("MANAGER_ID");
        $emps = DB::table("employees")->max("salary");
        $emps = DB::table("employees")->min("salary");
        $emps = DB::table("employees")->avg("salary");
        $emps = DB::table("employees")->sum("salary");
        $emps = DB::table("employees")->select("FIRST_NAME as name")->get();

        $emps = DB::table("employees")->select("JOB_ID")->distinct()->get();

        $emps = DB::table("employees")->selectRaw("count(*) as number_of_emps , DEPARTMENT_ID")->groupBy("DEPARTMENT_ID")->get();

        $emps = DB::table("employees")
            ->join("departments", "employees.DEPARTMENT_ID", "=", "departments.DEPARTMENT_ID")
            ->select("employees.FIRST_NAME", "departments.DEPARTMENT_NAME")->get();

        $emps_1 = DB::table("employees")
            ->leftJoin("departments", "employees.DEPARTMENT_ID", "=", "departments.DEPARTMENT_ID")
            ->select("employees.FIRST_NAME", "departments.DEPARTMENT_NAME");

        $emps_2 = DB::table("employees")
            ->rightJoin("departments", "employees.DEPARTMENT_ID", "=", "departments.DEPARTMENT_ID")
            ->union($emps_1)
            ->select("employees.FIRST_NAME", "departments.DEPARTMENT_NAME")->get();

        $emps = DB::table("employees")->where("salary", ">", "15000")->get();

        $emps = DB::table("employees")
            ->where("salary", ">", "8000")
            ->where("DEPARTMENT_ID", "=", "80")
            ->get();

        $emps = DB::table("employees")
            ->where("LAST_NAME", "like", "k%")
            ->get();


        $emps = DB::table("employees")
            ->where([
                ["salary", ">", "8000"],
                ["DEPARTMENT_ID", "=", "80"],
            ])
            ->get();

        $emps = DB::table("employees")
            ->where("salary", ">", "8000")
            ->orWhere("DEPARTMENT_ID", "=", "80")
            ->get();

        DB::table('users')
            ->where('password', '123')
            ->where(function ($user) {
                $user->where('email', 'ahmed@mail.com')
                    ->orWhere('mobile', '0100546546');
            })->get();
        dd($emps);

        dd($emps_2);
        foreach ($emps as $emp) {
            echo "Name : " . $emp->FIRST_NAME . ' ' . $emp->LAST_NAME . "<br>";
            echo "JOB ID : " . $emp->JOB_ID . "<br>";
            echo "SALARY : " . $emp->SALARY . "<br> <hr>";
        }
        // dd(DB::insert("INSERT INTO `regions`(`REGION_ID`, `REGION_NAME`) VALUES ('55','insert from laravel')"));
        // dd(DB::insert("INSERT INTO `regions`(`REGION_ID`, `REGION_NAME`) VALUES (?,?)", [777, 'insert from laravel v2']));
        // dd(DB::update("update regions set REGION_NAME = 'update laravel' where REGION_ID = 777"));
        // dd(DB::update("update regions set REGION_NAME = 'update laravel v2' where REGION_ID = ?", [55]));
        dd(DB::delete("delete from regions where REGION_ID in (55,777)"));
    }
}
