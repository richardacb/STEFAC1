@extends('adminlte::page')

@section('title', 'Insetar Asignatura')

@section('content_header')
    <h1>Insertar Afectación</h1>
@stop

@section('content')
    <form action="{{ route('afectaciones.store') }}" method="POST" id="create_afect">

        @csrf
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-row w-100">
                <div class="mb-3 w-50 mx-1">
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
                </div>
                <div class="mb-3 w-50 mx-1">
                    <label for="" class="form-label">Profesor Suplente</label>
                    <select name="profesor_suplente_id" id="profesor_suplente_id" class="form-control mr-sm-2 form-select">
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
                </div>
            </div>

            <div class="py-2">
                <strong class="error-message text-danger" id="err_prof"></strong>
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Semana</label>
            <input type="text" class="form-control" id="semana" name="semana"
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
            <input type="text" class="form-control" id="turno" name="turno"
                placeholder="Ingrese el Turno Afectado">
            @error('turno')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Año Docente</label>
            <input type="text" class="form-control" id="anno" name="anno"
                placeholder="Ingrese el Año Docente">
            @error('anno')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
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
    <script src="{{ asset('js/create.afect.js') }}"></script>
@stop
