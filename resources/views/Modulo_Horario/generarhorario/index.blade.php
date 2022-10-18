@extends('adminlte::page')

@section('title', 'Horarios Generados')

@section('content_header')
    @can('Modulo_Horario.generarhorario.create')
        <a href="{{ route('generarhorario.create') }}" class="btn btn-primary btn-sm float-right" role="button">Crear Horario</a>
    @endcan
    <?php
    if (isset($_GET['ok']) && $_GET['ok'] == 1) {
        /*echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
            <strong> ¡Horario Generado satisfactoriamente! </strong>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";*/
        $mostrar = "
            <div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
                <strong>Horario Generado!</strong>
                <button type=\"button\" class=\"close btn btn-success\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span>X</span>
                </button>
              </div>";
        echo $mostrar;
    }
    ?>
@stop
@section('content')

@stop
@section('js')
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

@stop
