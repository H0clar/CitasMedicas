<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function dashboard()
    {
        return view('medico.layouts.dashboard');
    }
}
