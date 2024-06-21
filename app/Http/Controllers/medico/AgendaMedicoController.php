<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaMedicoController extends Controller
{
    public function index()
    {
        return view('medico.agenda.agenda');
    }
}
