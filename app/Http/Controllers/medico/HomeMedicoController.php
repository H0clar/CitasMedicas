<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeMedicoController extends Controller
{
    public function home()
    {
        return view('medico.home', ['user' => Auth::user()]);
    }
}
