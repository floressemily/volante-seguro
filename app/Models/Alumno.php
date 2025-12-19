<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use SoftDeletes;

    protected $table = 'alumnos';

    protected $fillable = [
        'nombre_completo',
        'cedula',
        'telefono',
        'tipo_licencia',
        'estado',
    ];
}
