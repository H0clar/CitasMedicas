<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';

    protected $fillable = [
        'user_id', 'fecha', 'hora', 'doctor', 'especialidad',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
