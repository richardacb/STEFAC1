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
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
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
            @role('Vicedecana')
                <input type="number" class="form-control" id="anno" name="anno" value="" min="1"
                    max="5" placeholder="Ingrese el número de su año docente">
                @error('anno')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            @else
                <input type="text" class="form-control" id="anno" name="anno"
                    placeholder="Ingrese el número de su año docente" value="{{ $asignatura->anno }}" readonly>
                @error('anno')
                    <strong class="error-message text-danger">{{ $message }}</strong>
                @enderror
            @endrole
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Semestre</label>
            @role('Vicedecana')
                <input type="number" class="form-control" id="semestre" name="semestre" min="1" max="10"
                    placeholder="Ingrese el número del Semestre">
                @error('semestre')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            @else
                <input type="number" class="form-control" id="semestre" name="semestre"
                    placeholder="Ingrese el número del Semestre" min="{{ $asignatura->anno + ($asignatura->anno - 1) }}"
                    max="{{ $asignatura->anno * 2 }}">
                @error('semestre')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            @endrole
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select class="form-control" name="estado" id="estado">
                @if ($asignatura->estado === 1)
                    <option value="{{ $asignatura->estado }}">Activa</option>
                    <option value="0">Inactiva</option>
                @endif
                @if ($asignatura->estado === 0)
                    <option value="{{ $asignatura->estado }}">Inactiva</option>
                    <option value="1">Activa</option>
                @endif
            </select>
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
