@extends('layouts.app')

@section('content')
<h1>Adicionar Profesor</h1>
<form action="/profesores" method="POST">
    @csrf
    <div class="mt-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
    </div>
    <div class="mt-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control">
    </div>
    <div class="mt-3">
        <label class="form-label">Categoría Docente</label>
        <select name="categoria_docente" id="categoria_docente" class="form-control">
            <option value="">-Seleccione Categoría Docente-</option>
            <option value="Instructor">Instructor</option>
            <option value="Asistente">Asistente</option>
            <option value="Profesor Auxiliar">Profesor Auxiliar</option>
            <option value="Profesor Titular">Profesor Titular</option>
        </select>
    </div>
    <div class="mt-3">
        <label class="form-label">Categoría Científica</label>
        <select name="categoria_cientifica" id="categoria_cientifica" class="form-control">
            <option value="">-Seleccione Categoría Científica-</option>
            <option value="Ms.C">Ms.C</option>
            <option value="Dr.C">Dr.C</option>
        </select>
    </div>
    <div class="mt-3">
        <label class="form-label">Cargo</label>
        <select name="cargo" id="cargo" class="form-control">
            <option value="">-Seleccione Cargo-</option>
            <option value="Profesor">Profesor</option>
            <option value="Profesor Principal">Profesor Principal</option>
            <option value="VDF">VDF</option>
            <option value="J.Dpto">J.Dpto</option>
            <option value="Decano">Decano</option>
        </select>
    </div>
    <div class="mt-3">
        <a href="/profesores" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </div>
</form>
@endsection
