@extends('layouts.app')

@section('titulo', 'Alumnos')

@section('contenido')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Alumnos</h1>
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary">
            Nuevo alumno
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Nombre completo</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>Tipo de licencia</th>
                <th>Estado</th>
                <th>Fecha de inscripción</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->nombre_completo }}</td>
                    <td>{{ $alumno->cedula }}</td>
                    <td>{{ $alumno->telefono }}</td>
                    <td>{{ $alumno->tipo_licencia }}</td>
                    <td>{{ $alumno->estado }}</td>
                    <td>{{ $alumno->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Está seguro de eliminar este alumno?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        No hay alumnos registrados.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
