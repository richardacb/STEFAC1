@extends('adminlte::page')

@section('title', 'Insetar Asignatura')

@section('content_header')
    <h1>Insertar Asignaturas</h1>
@stop

@section('content')
    <form action="{{ route('asignaturas.store') }}" method="POST">

        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Sesión</label>
            <select name="seccion" id="seccion" class="form-control mr-sm-2 form-select">
                <option value="0" selected="selected">--Seleccione--</option>
                @foreach ($secciones as $s)
                    <option value="{{ $s->id }}">
                        {{ $s->nombre }}
                    </option>
                @endforeach
            </select>
            @error('seccion')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                placeholder="Ingrese el nombre de la Asignatura">
            @error('nombre')
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
                <input type="number" class="form-control" id="anno" name="anno" value="{{ $anno }}"
                    min="{{ $anno }}" max="{{ $anno }}" placeholder="Ingrese el número de su año docente"
                    readonly>
                @error('anno')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
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
                <input type="number" class="form-control" id="semestre" name="semestre" min="{{ $anno + ($anno - 1) }}"
                    max="{{ $anno * 2 }}" placeholder="Ingrese el número del Semestre">
                @error('semestre')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            @endrole
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select class="form-control" name="estado" id="estado">
                <option value="" selected="selected">Seleccione el Estado</option>
                <option value="1">Activa</option>
                <option value="0">Inactiva</option>
            </select>
            @error('estado')
                <strong class="error-message text-danger"> {{ 'Campo Requerido' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <a href="{{ route('asignaturas.index') }}" class="btn btn-danger mr-2">Cancelar</a>

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
