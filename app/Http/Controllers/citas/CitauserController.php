<?php

namespace App\Http\Controllers\Citas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Medico;
use Illuminate\Support\Facades\Auth;

class CitaUserController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('citas.usuario.citasuser', compact('medicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'doctor' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
        ]);

        $cita = Cita::create([
            'user_id' => Auth::id(),
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return response()->json(['success' => true, 'message' => 'Cita creada exitosamente', 'id' => $cita->id]);
    }
}
