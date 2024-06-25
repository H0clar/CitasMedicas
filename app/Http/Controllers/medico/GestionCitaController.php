<?php

namespace App\Http\Controllers\medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestionCitaController extends Controller
{
    public function show($id)
    {
        // Lógica para obtener la información de la cita y el paciente según el ID
        $cita = [
            'id' => $id,
            'patient' => 'Juan Pérez',
            'dateTime' => 'Jueves, 06 de mayo - 9:00 a 10:00 hrs',
            'doctor' => 'Dr. Matías García',
            'phone' => '+569 8765 4321',
            'email' => 'juanperez@gmail.com',
            'comment' => 'Paciente con hipertensión'
        ];
        
        // Asegúrate de que la ruta a la vista sea correcta
        return view('medico.agenda.gestionar-cita', compact('cita'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar la información de la cita
        // Validar y guardar los datos del formulario
        $validatedData = $request->validate([
            'diagnostico' => 'required|string',
            'indicaciones' => 'nullable|file|mimes:pdf,jpg,png',
            'receta' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        // Actualizar la cita en la base de datos
        // Ejemplo: $cita = Cita::findOrFail($id);
        // $cita->update($validatedData);
        // Si hay archivos subidos, manejarlos aquí

        return redirect()->route('gestionar.cita', ['id' => $id])->with('status', 'Información actualizada exitosamente.');
    }
}
