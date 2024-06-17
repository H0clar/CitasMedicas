<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicoSeeder extends Seeder
{
    public function run()
    {
        $medicos = [
            [
                'nombre' => 'Dr. Juan Pérez',
                'rut' => '12345678-9',
                'telefono' => '987654321',
                'email' => 'juan.perez@hospital.com',
                'especialidad' => 'Cardiología',
                'horario_atencion' => 'Lunes a Viernes, 8:00 - 16:00',
            ],
            [
                'nombre' => 'Dra. María Gómez',
                'rut' => '98765432-1',
                'telefono' => '123456789',
                'email' => 'maria.gomez@hospital.com',
                'especialidad' => 'Dermatología',
                'horario_atencion' => 'Martes y Jueves, 10:00 - 18:00',
            ],
            // Agrega más médicos según sea necesario
        ];

        foreach ($medicos as $medico) {
            Medico::firstOrCreate(
                ['rut' => $medico['rut']], 
                $medico
            );
        }
    }
}
