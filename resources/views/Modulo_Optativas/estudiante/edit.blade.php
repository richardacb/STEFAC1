@extends('layouts.app')

@section('content')
    <h1>Editar Estudiante</h1>
    <form action="/estudiantes/{{ $estudiante->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $estudiante->nombre }}">
        </div>
        <div class="mt-3">
            <label class="form-label">Año</label>
            <input type="number" name="anno" id="anno" class="form-control" value="{{ $estudiante->anno }}">
        </div>
        <div class="mt-3">
            <label class="form-label">Grupo</label>
            <input type="text" name="grupo" id="grupo" class="form-control" value="{{ $estudiante->grupo }}">
        </div>
        <div class="mt-3">
            <a href="/estudiantes" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
@endsection
