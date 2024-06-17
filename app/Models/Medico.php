<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $fillable = [
        'nombre', 'rut', 'telefono', 'email', 'especialidad', 'horario_atencion',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
