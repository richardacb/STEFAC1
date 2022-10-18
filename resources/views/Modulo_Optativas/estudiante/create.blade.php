@extends('layouts.app')

@section('content')
<h1>Adicionar Estudiante</h1>
<form action="/estudiantes" method="POST">
    @csrf
    <div class="mt-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
    </div>
    <div class="mt-3">
        <label class="form-label">Año</label>
        <input type="number" name="anno" id="anno" class="form-control">
    </div>
    <div class="mt-3">
        <label class="form-label">Grupo</label>
        <input type="text" name="grupo" id="grupo" class="form-control">
    </div>

    <div class="mt-3">
        <a href="/estudiantes" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </div>
</form>
@endsection
