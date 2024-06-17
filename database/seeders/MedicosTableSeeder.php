<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MedicosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('medicos')->insert([
            [
                'nombre' => 'Dr. Juan Pérez',
                'rut' => Str::random(10),
                'telefono' => '123456789',
                'email' => 'juan.perez@example.com',
                'especialidad' => 'Cardiología',
                'horario_atencion' => 'Lunes a Viernes de 8:00 a 17:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Dra. María Gómez',
                'rut' => Str::random(10),
                'telefono' => '987654321',
                'email' => 'maria.gomez@example.com',
                'especialidad' => 'Dermatología',
                'horario_atencion' => 'Lunes a Viernes de 9:00 a 18:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
