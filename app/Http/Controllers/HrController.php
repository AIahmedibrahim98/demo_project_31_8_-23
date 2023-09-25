<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HrController extends Controller
{
    public function index()
    {
        $emps = DB::select("select * from employees");
        // dd($emps);
        // dump($emps);
        // echo "Test";
        // var_dump($emps);

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
