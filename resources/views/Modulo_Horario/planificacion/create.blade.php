@extends('adminlte::page')

@section('title', 'Carga Docente')

@section('content_header')
    <h1>Insertar Carga Docente</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
    {{--  {{ $id = onchange="devolver_id();" }}  --}}
    <form action="{{ route('planificacion.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Asignaturas</label>
            <br>
            <select name="asignaturas_id" id="asignaturas_id" class="form-control mr-sm-2 form-select">
                <option value="0" selected="selected">--Seleccione--</option>
                @foreach ($asignaturas as $a)
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
            <label for="" class="form-label">Profesores</label>
            <br>
            <select name="profesores_id" id="profesores_id" class="form-control mr-sm-2 form-select">
                <option value="0" selected="selected">--Seleccione el Profesor--</option>
            </select>
            @error('profesores_id')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Grupos</label>
            <br>
            <select name="grupos_id" id="grupos_id" class="form-control mr-sm-2 form-select">
                <option value="0" selected="selected">--Seleccione--</option>
                @foreach ($grupos as $g)
                    <option value="{{ $g->id }}">
                        {{ $g->name }}
                    </option>
                @endforeach
            </select>
            @error('grupos_id')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <a href="{{ route('planificacion.index') }}" class="btn btn-danger">Cancelar</a>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif


@stop
@section('js')


    {{--  <script>
        function devolver_id() {
             $("#asignaturas_id").change(function() {
                 alert('hola');
                 let value = $("#asignaturas_id").val();

                 return value;
             });

        }
    </script>  --}}
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/myjs.js') }}" defer></script>

@endsection
