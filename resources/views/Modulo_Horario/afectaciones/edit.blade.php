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
                @foreach ($profesor as $pr)
                    @if ($pr->id === $afectacion->profesores_afectados_id)
                        <option value="{{ $pr->id }}">{{ $pr->nombre_profesor }}</option>
                    @endif
                @endforeach
                @foreach ($profesor as $pr)
                    @if ($pr->id !== $afectacion->profesores_afectados_id)
                        <option value="{{ $pr->id }}">{{ $pr->nombre_profesor }}</option>
                    @endif
                @endforeach
            </select>
            @error('profesor_id')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Semana</label>
            <input type="number" class="form-control" id="semana" name="semana"
                placeholder="Ingrese la Semana Afectada" value="{{ $afectacion->semana }}">
            @error('semana')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Día de la Semana Afectado</label>
            <select name="dia" id="dia" class="form-control mr-sm-2 form-select">
                <option value="{{ $afectacion->dia }}">{{ $afectacion->dia }}</option>
                @for ($i = 1; $i < 6; $i++)
                    @if ($i !== $afectacion->dia)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                @endfor
            </select>
            @error('dia')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Turno de Clases</label>
            <input type="number" class="form-control" id="turno" name="turno" value="{{ $afectacion->turno }}"
                min="1" max="6" placeholder="Ingrese el Turno Afectado">
            @error('turno')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Año Docente</label>
            @role('Vicedecana')
                <input type="number" class="form-control" id="anno" name="anno" value="" min="1"
                    max="5" placeholder="Ingrese el número de su año docente">
                @error('anno')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            @else
                <input type="number" class="form-control" id="anno" name="anno" min="{{ $anno }}"
                    max="{{ $anno }}" value="{{ $anno }}">
                @error('anno')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
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
    <script>
        console.log('Hi!');
    </script>
@stop
