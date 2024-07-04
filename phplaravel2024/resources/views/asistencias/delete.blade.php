@extends('layouts.app')

@section('content')
<h1>Eliminar Asistencia</h1>
<form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="estudiante_nombre" class="form-label">Estudiante</label>
            <input type="text" class="form-control" id="estudiante_nombre" value="{{ $asistencia->estudiante->nombre }} {{ $asistencia->estudiante->apellido }}" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="grupo_nombre" class="form-label">Grupo</label>
            <input type="text" class="form-control" id="grupo_nombre" value="{{ $asistencia->grupo->nombre }}" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="text" class="form-control" id="fecha" value="{{ $asistencia->fecha }}" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="hora_entrada" class="form-label">Hora de Entrada</label>
            <input type="text" class="form-control" id="hora_entrada" value="{{ $asistencia->hora_entrada }}" disabled>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</form>
@endsection