@extends('adminlte::page')

@section('title', 'Editar Afetaciones')

@section('content_header')
    <h1>Editar Afetaciones</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <form action="/admin/afectaciones/{{ $afectacion->id }} " method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Profesor Afectado</label>
            <select name="profesor_id" id="profesor_id" class="form-control mr-sm-2 form-select">
                @foreach ($profesores as $pr)
                    @if ($pr->id === $afectacion->profesores_afectados_id)
                        <option value="{{ $pr->id }}">{{ $pr->nombre }}</option>
                    @endif
                @endforeach
                @foreach ($profesores as $pr)
                    @if ($pr->id !== $afectacion->profesores_afectados_id)
                        <option value="{{ $pr->id }}">{{ $pr->nombre }}</option>
                    @endif
                @endforeach
            </select>
            @error('profesor_id')
                <strong class="error-message text-danger"> {{ "Campos Requeridos" }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Profesor Suplente</label>
            <select name="profesor_suplente_id" id="profesor_suplente_id" class="form-control mr-sm-2 form-select">
                @foreach ($profesores as $pr)
                    @if ($pr->id === $afectacion->profesores_suplentes_id)
                        <option value="{{ $pr->id }}">{{ $pr->nombre }}</option>
                    @endif
                @endforeach
                @foreach ($profesores as $pr)
                    @if ($pr->id !== $afectacion->profesores_suplentes_id)
                        <option value="{{ $pr->id }}">{{ $pr->nombre }}</option>
                    @endif
                @endforeach
            </select>
            @error('profesor_id')
                <strong class="error-message text-danger"> {{ "Campos Requeridos" }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Semana</label>
            <input type="text" class="form-control" id="semana" name="semana"
                placeholder="Ingrese la Semana Afectada" value="{{ $afectacion->semana }}">
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
                {{--  @foreach ($afectacion as $a)
                    @if ($a->dia === $dia)
                        <option value="1">Lunes</option>
                        <option value="2">Martes</option>
                        <option value="3">Miércoles</option>
                        <option value="4">Jueves</option>
                        <option value="5">Viernes</option>
                        </option>
                    @endif
                @endforeach  --}}
            </select>
            @error('dia')
                <strong class="error-message text-danger"> {{ "Campos Requeridos" }} </strong>
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
    <script>
        console.log('Hi!');
    </script>
@stop
