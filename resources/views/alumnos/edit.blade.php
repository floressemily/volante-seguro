@extends('layouts.app')

@section('titulo', 'Editar alumno')

@section('contenido')

    <h1 class="mb-4">Editar alumno</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('alumnos.update', $alumno) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre completo *</label>
            <input type="text" name="nombre_completo" class="form-control"
                   value="{{ $alumno->nombre_completo }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cédula *</label>
            <input type="text" name="cedula" class="form-control"
                   value="{{ $alumno->cedula }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text" name="telefono" class="form-control"
                   value="{{ $alumno->telefono }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo de licencia *</label>
            <select name="tipo_licencia" class="form-select" required>
                <option value="Tipo A" {{ $alumno->tipo_licencia == 'Tipo A' ? 'selected' : '' }}>Tipo A</option>
                <option value="Tipo B" {{ $alumno->tipo_licencia == 'Tipo B' ? 'selected' : '' }}>Tipo B</option>
                <option value="Tipo C" {{ $alumno->tipo_licencia == 'Tipo C' ? 'selected' : '' }}>Tipo C</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado *</label>
            <select name="estado" class="form-select" required>
                <option value="Inscrito" {{ $alumno->estado == 'Inscrito' ? 'selected' : '' }}>Inscrito</option>
                <option value="Clases teóricas" {{ $alumno->estado == 'Clases teóricas' ? 'selected' : '' }}>Clases teóricas</option>
                <option value="Practicando" {{ $alumno->estado == 'Practicando' ? 'selected' : '' }}>Practicando</option>
                <option value="Aprobó" {{ $alumno->estado == 'Aprobó' ? 'selected' : '' }}>Aprobó</option>
            </select>
        </div>

        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>
    </form>

@endsection
