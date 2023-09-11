<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function name($x, $y = 5)
    {
        return "Hello $x .. Your Age is $y";
    }
}

