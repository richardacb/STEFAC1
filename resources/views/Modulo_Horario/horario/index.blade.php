@extends('adminlte::page')

@section('title', 'Horario')

@section('content_header')


@stop

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
    <nav class="navbar navbar-light float-right">
        <form class="form-block form-horizontal text-secondary" id="buscarindex" name="buscarindex" style="padding: 2rem 2rem;"
            {{--  method="GET" action="{{ url('horario/buscar') }}" --}}>
            {{ csrf_field() }}
            <div class="mb-3"  >
                <strong class="error-message text-danger" id="error_buscarhorario"></strong>
            </div>
            <div class="mb-3" style="width: 100%">
                <label for="" class="form-label">Año Docente</label>
                <input type="number" class="form-control" id="anno" name="anno"
                    placeholder="Ingrese el número del año a buscar">
                @error('anno')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            </div>
            <div class="mb-3" style="width: 100%">
                <label for="" class="form-label">Semana del Curso</label>
                <input type="number" class="form-control" id="semana" name="semana"
                    placeholder="Ingrese el número de la semana">
                @error('semana')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            </div>
            <div class="mb-3" style="width: 100%">
                <label for="" class="form-label">Grupo</label>
                <input type="text" class="form-control" id="grupo" name="grupo"
                    placeholder="Ingrese el número del grupo">
                @error('grupo')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            </div>
            <input id="boton" type="submit" class="btn btn-primary" value="Buscar">
        </form>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12" id="body_horario">

            </div>
        </div>
    </div>


@stop
@section('js')
    <script src="{{ asset('js/myjs.js') }}"></script>
@endsection
