<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function multiply($x, $y, $z)
    {
        return $x * $y * $z;
    }
}
