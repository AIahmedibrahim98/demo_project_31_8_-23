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
        // dd($emps);
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

        /* DB::table('users')
            ->where('password', '123')
            ->where(function ($user) {
                $user->where('email', 'ahmed@mail.com')
                    ->orWhere('mobile', '0100546546');
            })->get(); */


        $emps = DB::table("employees")
            ->whereBetween('salary', [5000, 10000])
            // ->whereNotBetween('salary', [5000, 10000])
            // ->whereIn('DEPARTMENT_ID',[80,70,50])
            // ->whereIn('DEPARTMENT_ID',[80,70,50])
            // ->whereNotNull('COMMISSION_PCT')
            // ->whereNull('COMMISSION_PCT')
            // ->where('hire_date','2003-06-17')
            // ->whereMonth('hire_date','06')
            // ->whereDay('hire_date','10')
            // ->whereYear('hire_date','2003')
            // ->whereTime('hire_date','18:00:00')
            // ->orderBy('salary')
            ->orderBy('salary', 'desc')
            ->orderBy('LAST_NAME')
            ->get();
        // ->toSql();


        $emps = DB::table("employees")
            // ->latest('hire_date')
            // ->oldest('hire_date')
            ->inRandomOrder()
            ->first();

        $emps = DB::table("employees")
            // ->limit(10)->offset(10)
            ->skip(10)->take(5)
            ->get();

        dd($emps);

        // dd($emps_2);
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

    public function dml()
    {
        /*   $regions = DB::table('regions')
            ->insert([
                'REGION_ID' => 777,
                'REGION_NAME' => 'Insert From query bulider',
            ]); */

        /*         $regions = DB::table('regions')
            ->insert([
                [
                    'REGION_ID' => 888,
                    'REGION_NAME' => 'Insert From query bulider',
                ],
                [
                    'REGION_ID' => 999,
                    'REGION_NAME' => 'Insert From query bulider',
                ]
            ]); */


        /*         $regions = DB::table('regions')
            ->insertOrIgnore([
                [
                    'REGION_ID' => 888,
                    'REGION_NAME' => 'Insert From query bulider',
                ],
                [
                    'REGION_ID' => 999,
                    'REGION_NAME' => 'Insert From query bulider',
                ],
                [
                    'REGION_ID' => 555,
                    'REGION_NAME' => 'Insert From query bulider',
                ]
            ]); */

        /* $regions = DB::table('regions')->updateOrInsert([
            'REGION_ID' => 444
        ], [
            'REGION_NAME' => 'From query bulider2'
        ]); */

        /*    $regions = DB::table('employees')
        ->where('salary', '<=', 5000)
        ->increment('salary',5000); */

        /* $regions = DB::table('employees')
            ->where('salary', '<=', 10000)
            ->decrement('salary'); */

        /*         $regions = DB::table('employees')
            ->where('salary', '<=', 5000)
            ->incrementEach([
                'salary' => 5000,
                'COMMISSION_PCT' => .5
            ]);

        $regions = DB::table('employees')
            ->where('salary', '<=', 5000)
            ->decrementEach([
                'salary' => 5000,
                'COMMISSION_PCT' => .5
            ]); */
        $regions = DB::table('regions')
        ->whereIn('REGION_ID',[444,555,777,888,999])
        ->delete();

        dd($regions);
    }
}
