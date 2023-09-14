<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesContoller extends Controller
{
    public function sales()
    {
        $agents = [
            'ahmed' => ['jun' => 5000, 'fub' => 3000, 'march' => 78000],
            'sara' => ['jun' => 8000, 'fub' => 88000, 'march' => 98000],
            'ali' => ['jun' => 3000, 'fub' => 99000, 'march' => 58000],
            'maha' => ['jun' => 4000, 'fub' => 50000, 'march' => 12000],
            'engy' => ['jun' => 4000, 'fub' => 50000, 'march' => 12000],
        ];
        return view('sales', compact('agents'));
    }
}
