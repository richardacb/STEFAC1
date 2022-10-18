@extends('adminlte::page')

@section('title', 'Editar Asignatura')

@section('content_header')
    <h1>Editar Asignaturas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <form action="/admin/asignaturas/{{ $asignatura->id }} " method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Sección</label>
            <select name="seccion" id="seccion" class="form-control mr-sm-2 form-select">
                @foreach ($secciones as $s)
                    @if ($s->id === $asignatura->secciones_id)
                        <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                    @endif
                @endforeach
                @foreach ($secciones as $s)
                @if ($s->id !== $asignatura->secciones_id)
                    <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                @endif
            @endforeach
            </select>
            @error('seccion')
                <strong class="error-message text-danger"> {{ "Campos Requeridos" }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                placeholder="Ingrese el nombre de la Asignatura" value="{{ $asignatura->nombre }}">
            @error('nombre')
            <strong class="error-message text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Año Docente</label>
            <input type="text" class="form-control" id="anno" name="anno"
                placeholder="Ingrese el número de su año docente" value="{{ $asignatura->anno }}">
            @error('anno')
            <strong class="error-message text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="mb-3">
            <a href="{{ route('asignaturas.index') }}" class="btn btn-danger">Cancelar</a>
            <input type="submit" class="btn btn-primary" value="Editar">
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
