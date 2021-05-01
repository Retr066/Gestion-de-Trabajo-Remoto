<?php

namespace App\Http\Controllers;
use App\Models\Informe;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function index()
    {
        return Informe::all();
    }
}
