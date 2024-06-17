<?php

namespace App\Http\Controllers\citas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Medico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CitauserController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('citas.usuario.citasuser', compact('medicos'));
    }

    public function store(Request $request)
    {
        Log::info('Store request:', $request->all());
    
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'medico_id' => 'required|integer|exists:medicos,id',
            'especialidad' => 'required|string|max:255',
        ]);
    
        try {
            $cita = Cita::create([
                'user_id' => Auth::id(),
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
                'descripcion' => $request->input('descripcion', ''),
                'medico_id' => $request->input('medico_id'),
            ]);
    
            Log::info('Cita creada:', $cita->toArray());
    
            return response()->json(['success' => true, 'message' => 'Cita creada exitosamente', 'cita' => $cita]);
        } catch (\Exception $e) {
            Log::error('Error al crear cita:', ['exception' => $e]);
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    

    public function list()
    {
        try {
            $citas = Cita::where('user_id', Auth::id())->get();
            return response()->json($citas);
        } catch (\Exception $e) {
            Log::error('Error al listar citas:', ['exception' => $e]);
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getHorarios(Medico $medico)
    {
        $horarios = $this->generarHorariosDisponibles();
        return response()->json($horarios);
    }

    private function generarHorariosDisponibles()
    {
        $horarios = [];
        for ($hora = 9; $hora < 13; $hora++) {
            $horarios[] = sprintf("%02d:00:00", $hora);
        }
        for ($hora = 15; $hora < 17; $hora++) {
            $horarios[] = sprintf("%02d:00:00", $hora);
        }
        return $horarios;
    }
}
