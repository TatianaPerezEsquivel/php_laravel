@extends('layouts.app')

@section('content')
<h1>Crear nueva asistencia</h1>
<form action="{{ route('asistencias.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="estudiante_id" class="form-label">Estudiante</label>
            <select name="estudiante_id" class="form-control" required>
                <option value="">Seleccione un estudiante</option>
                @foreach ($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="grupo_id" class="form-label">Grupo</label>
            <select name="grupo_id" class="form-control" required>
                <option value="">Seleccione un grupo</option>
                @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="hora_entrada" class="form-label">Hora de Entrada</label>
            <input type="time" name="hora_entrada" class="form-control" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</form>
@endsection