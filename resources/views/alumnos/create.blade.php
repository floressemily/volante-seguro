@extends('layouts.app')

@section('titulo', 'Registrar alumno')

@section('contenido')

    <h1 class="mb-4">Registrar alumno</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre completo *</label>
            <input type="text" name="nombre_completo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cédula *</label>
            <input type="text" name="cedula" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo de licencia *</label>
            <select name="tipo_licencia" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="Tipo A">Tipo A</option>
                <option value="Tipo B">Tipo B</option>
                <option value="Tipo C">Tipo C</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado *</label>
            <select name="estado" class="form-select" required>
                <option value="Inscrito">Inscrito</option>
                <option value="Clases teóricas">Clases teóricas</option>
                <option value="Practicando">Practicando</option>
                <option value="Aprobó">Aprobó</option>
            </select>
        </div>

        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>

@endsection
