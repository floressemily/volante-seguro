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
        'estado'
    ];

    /* ===== LÓGICA DEL NEGOCIO ===== */

    public static function obtenerTodos()
    {
        return self::orderBy('created_at', 'desc')->get();
    }

    public static function crearAlumno(array $datos)
    {
        return self::create($datos);
    }

    public function actualizarAlumno(array $datos)
    {
        return $this->update($datos);
    }

    public function eliminarAlumno()
    {
        return $this->delete(); // borrado lógico
    }
}
