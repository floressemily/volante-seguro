<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Mostrar listado de alumnos
     */
    public function index()
    {
        $alumnos = Alumno::orderBy('created_at', 'desc')->get();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Guardar un nuevo alumno
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => [
                'required',
                'max:150',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
            ],
            'cedula' => [
                'required',
                'digits:10',
                'numeric',
                'unique:alumnos,cedula'
            ],
            'telefono' => [
                'required',
                'digits_between:9,10',
                'numeric'
            ],
            'tipo_licencia' => 'required|max:50',
            'estado' => 'required|max:30',
        ]);

        Alumno::create($request->all());


        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno registrado correctamente.');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Actualizar alumno
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre_completo' => [
                'required',
                'max:150',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
            ],
            'cedula' => [
                'required',
                'digits:10',
                'numeric',
                'unique:alumnos,cedula,' . $alumno->id
            ],
            'telefono' => [
                'required',
                'digits_between:9,10',
                'numeric'
            ],
            'tipo_licencia' => 'required|max:50',
            'estado' => 'required|max:30',
        ]);

        $alumno->update($request->all());


        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente.');
    }

    /**
     * Eliminación lógica del alumno
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente.');
    }
}
