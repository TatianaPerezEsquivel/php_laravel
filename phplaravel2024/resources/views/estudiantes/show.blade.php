@extends('layouts.app')

@section('content')
<h1>Ver estudiante</h1>
<div class="row">
    <div class="col-md-4">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" value="{{ $estudiante->nombre}}" disabled>
    </div>
    <div class="col-md-4">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" value="{{ $estudiante->apellido}}" disabled>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="email" class="form-label">Correo Electronico</label>
        <textarea class="form-control" id="email" name="email" disabled>{{ $estudiante->email}} </textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="password" class="form-label">Pin</label>
            <textarea class="form-control" id="password" name="password" disabled>{{ $estudiante->pin}} </textarea>
        </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('estudiantes.index')}}" class="btn btn-primary">Retornar</a>
    </div>
</div>
@endsection
