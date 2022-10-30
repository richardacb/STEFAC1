@extends('adminlte::page')

@section('title', 'Insetar Prueba Parcial')

@section('content_header')
    <h1>Insetar Prueba Parcial</h1>
@stop

@section('content')
    <form action="http://localhost/STEFAC1/app/generar_horario/update_horario.php?form=edit_pp" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Año Docente</label>
            <input type="number" class="form-control" id="anno" name="anno" value="{{ $anno }}" min="{{ $anno }}" max="{{ $anno }}">
            @error('anno')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Semestre Docente</label>
            <input type="number" class="form-control" id="semestre" name="semestre" value="{{ $parciales->semestre }}">
            @error('asignaturas_id')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Semana</label>
            <input type="number" class="form-control" id="semana" name="semana" value="{{ $parciales->semana }}">
            @error('semana')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Día de la Semana</label>
            <input type="number" class="form-control" id="dia" name="dia" value="{{ $parciales->dia }}">
            @error('dia')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Turno del Día </label>
            <input type="number" class="form-control" id="turno" name="turno" value="{{ $parciales->turno }}">
            @error('turno')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Asignatura</label>
            <br>
            <select name="asignaturas_id" id="asignaturas_id" class="form-control mr-sm-2 form-select">
                <option value="0" selected="selected">--Seleccione--</option>
                @foreach ($nombreasignaturas as $a)
                    <option value="{{ $a->id }}">
                        {{ $a->nombre }}
                    </option>
                @endforeach
            </select>
            @error('asignaturas_id')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <a href="{{ route('parciales.index') }}" class="btn btn-danger">Cancelar</a>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
