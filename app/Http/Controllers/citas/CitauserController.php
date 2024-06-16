<?php

namespace App\Http\Controllers\Citas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitaUserController extends Controller
{
    public function index()
    {
        return view('citas.usuario.citasuser');
    }
}
