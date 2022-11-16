@extends('adminlte::page')

@section('title', 'Insetar Asignatura')

@section('content_header')
    <h1>Insertar Afectación</h1>
@stop

@section('content')
    <form {{-- action="{{ route('afectaciones.store') }}"--}} action="http://localhost/STEFAC1/app/generar_horario/update_horario.php"  id="create_afect"  method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Profesor Afectado</label>
            <select name="profesor_afectado_id" id="profesor_afectado_id" class="form-control mr-sm-2 form-select">
                <option value="" selected="selected">--Seleccione--</option>
                @foreach ($profesores as $pr)
                    <option value="{{ $pr->id }}">
                        {{ $pr->nombre_profesor }}
                    </option>
                @endforeach
            </select>
            @error('profesor_id')
                <strong class="error-message text-danger"> {{ 'Campo Requerido' }} </strong>
            @enderror
            <div class="py-2">
                <strong class="error-message text-danger" id="err_prof"></strong>
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Semana</label>
            <input type="number" class="form-control" id="semana" name="semana"
                placeholder="Ingrese la Semana Afectada">
            @error('semana')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Día de la Semana Afectado</label>
            <select name="dia" id="dia" class="form-control mr-sm-2 form-select">
                <option value="0" selected="selected">--Seleccione--</option>
                <option value="1">Lunes</option>
                <option value="2">Martes</option>
                <option value="3">Miércoles</option>
                <option value="4">Jueves</option>
                <option value="5">Viernes</option>
            </select>
            @error('dia')
                <strong class="error-message text-danger"> {{ 'Campo Requerido' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Turno de Clases</label>
            <input type="number" class="form-control" id="turno" name="turno" min="1" max="6"
                placeholder="Ingrese el Turno Afectado">
            @error('turno')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="anno" class="form-label">Año Docente</label>
            @role('Vicedecana')
            <input type="number" class="form-control" id="anno" name="anno" value=""
            min="1" max="5" placeholder="Ingrese el número de su año docente">
            @error('anno')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
            @else
            <input type="number" class="form-control" id="anno" name="anno" min="{{ $anno }}"
                max="{{ $anno }}" value="{{ $anno }}" readonly>
                @endrole
        </div>
        <div class="mb-3">
            <a href="{{ route('afectaciones.index') }}" class="btn btn-danger">Cancelar</a>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('js/myjs.js') }}"></script>
@stop
