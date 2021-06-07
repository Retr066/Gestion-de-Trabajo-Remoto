<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpController extends Controller
{
    public function getAllEmployees()
    {
        $employess = Employee::all();
        return view ('employee', compact('employees'))
    }
}
