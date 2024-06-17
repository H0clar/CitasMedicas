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
            'doctor' => 'required|integer|exists:medicos,id',
            'especialidad' => 'required|string|max:255',
        ]);

        try {
            $cita = Cita::create([
                'user_id' => Auth::id(),
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
                'descripcion' => $request->input('descripcion', ''),
                'medico_id' => $request->input('doctor'),
            ]);

            return response()->json(['success' => true, 'message' => 'Cita creada exitosamente', 'id' => $cita->id]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getHorarios(Medico $medico)
    {
        $horarios = explode(',', $medico->horario_atencion);
        return response()->json($horarios);
    }
}
