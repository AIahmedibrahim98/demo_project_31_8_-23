<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClacController extends Controller
{
    public function sum($x, $y)
    {
        return $x + $y;
    }

    public function sub($x, $y)
    {
        return $x - $y;
    }


    public function multi($x, $y)
    {
        return $x * $y;
    }

    public function dev($x, $y)
    {
        return $x / $y;
    }

}
