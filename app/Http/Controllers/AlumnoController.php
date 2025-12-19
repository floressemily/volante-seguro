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
        $alumnos = Alumno::obtenerTodos();
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
        $request->validate(
            [
                'nombre_completo' => [
                    'required',
                    'max:150',
                    'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
                ],
                'cedula' => 'required|digits:10|numeric|unique:alumnos,cedula',
                'telefono' => 'required|digits_between:9,10|numeric',
                'tipo_licencia' => 'required|max:50',
                'estado' => 'required|max:30',
            ],
            [
                'nombre_completo.required' => 'El nombre completo es obligatorio.',
                'nombre_completo.regex' => 'El nombre solo debe contener letras.',
                'cedula.required' => 'La cédula es obligatoria.',
                'cedula.digits' => 'La cédula debe tener 10 dígitos.',
                'cedula.unique' => 'Esta cédula ya está registrada.',
                'telefono.required' => 'El teléfono es obligatorio.',
                'telefono.numeric' => 'El teléfono solo debe contener números.',
                'tipo_licencia.required' => 'Debe seleccionar el tipo de licencia.',
                'estado.required' => 'Debe seleccionar el estado del alumno.',
            ]
        );

        Alumno::crearAlumno($request->all());

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
        $request->validate(
            [
                'nombre_completo' => [
                    'required',
                    'max:150',
                    'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
                ],
                'cedula' => 'required|digits:10|numeric|unique:alumnos,cedula,' . $alumno->id,
                'telefono' => 'required|digits_between:9,10|numeric',
                'tipo_licencia' => 'required|max:50',
                'estado' => 'required|max:30',
            ],
            [
                'nombre_completo.required' => 'El nombre completo es obligatorio.',
                'nombre_completo.regex' => 'El nombre solo debe contener letras.',
                'cedula.required' => 'La cédula es obligatoria.',
                'cedula.digits' => 'La cédula debe tener 10 dígitos.',
                'cedula.unique' => 'Esta cédula ya está registrada.',
                'telefono.required' => 'El teléfono es obligatorio.',
                'telefono.numeric' => 'El teléfono solo debe contener números.',
                'tipo_licencia.required' => 'Debe seleccionar el tipo de licencia.',
                'estado.required' => 'Debe seleccionar el estado del alumno.',
            ]
        );

        $alumno->actualizarAlumno($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente.');
    }


    public function destroy(Alumno $alumno)
    {
        $alumno->eliminarAlumno();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente.');
    }
}
