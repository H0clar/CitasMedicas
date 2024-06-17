<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|string',
            'medico_id' => 'required|exists:medicos,id',
            'especialidad' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $cita = Cita::create([
            'user_id' => Auth::id(),
            'medico_id' => $request->medico_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json(['success' => true, 'cita' => $cita]);
    }

    public function index()
    {
        $citas = Cita::where('user_id', Auth::id())->get();
        return response()->json($citas);
    }
}
