<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('citas')->insert([
            [
                'user_id' => 1,  // Asegúrate de que este usuario exista
                'medico_id' => 1,  // Asegúrate de que este médico exista
                'fecha' => '2024-06-20',
                'hora' => '10:00:00',
                'descripcion' => 'Consulta de seguimiento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'medico_id' => 2,
                'fecha' => '2024-06-21',
                'hora' => '11:00:00',
                'descripcion' => 'Consulta dermatológica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
