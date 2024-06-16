<?php

namespace App\Http\Controllers\Citas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CitauserController extends Controller
{
    public function index()
    {
        // Lógica para mostrar las citas del usuario
        return view('citas.usuario.citasuser');
    }
}
