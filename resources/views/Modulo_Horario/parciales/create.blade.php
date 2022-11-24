@extends('adminlte::page')

@section('title', 'Insetar Prueba Parcial')

@section('content_header')
    <h1>Insetar Prueba Parcial</h1>
@stop

@section('content')

    <?php
    if (isset($_GET['msg'])) {
        echo "
                                                    <div class=\"alert alert-warning alert-dismissible fade show w-50\" role=\"alert\">
                                                        <strong>" .
            $_GET['msg'] .
            "</strong>
                                                        <button type=\"button\" class=\"close btn btn-warning\" data-dismiss=\"alert\" aria-label=\"Close\">
                                                            <span>X</span>
                                                        </button>
                                                      </div>";
    }
    ?>
    <form action="http://localhost/STEFAC1/app/generar_horario/update_horario.php?form=create_pp" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Año Docente</label>
            @role('Vicedecana')
            <input type="number" class="form-control" id="anno" name="anno" value=""
            min="1" max="5" placeholder="Ingrese el número de su año docente">
            @error('anno')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
             @else
            <input type="number" class="form-control" id="anno" name="anno" value="{{ $anno }}"
                min="{{ $anno }}" max="{{ $anno }}" readonly>
            @endrole
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Semestre Docente</label>
            <input type="number" class="form-control" id="semestre" name="semestre" {{-- value="{{ $anno }}" min="{{ $anno }}" max="{{ $anno }}" --}}
                placeholder="Ingrese el número del Semestre">
            @error('asignaturas_id')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Semana</label>
            <input type="number" class="form-control" id="semana" name="semana" {{-- value="{{ $anno }}" min="{{ $anno }}" max="{{ $anno }}" --}}
                placeholder="Ingrese la Semana">
            @error('semana')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Día de la Semana</label>
            <input type="number" class="form-control" id="dia" name="dia" {{-- value="{{ $anno }}" min="{{ $anno }}" max="{{ $anno }}" --}}
                placeholder="Ingrese el día de la Semana">
            @error('dia')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Turno del Día </label>
            <input type="number" class="form-control" id="turno" name="turno" {{-- value="{{ $anno }}" min="{{ $anno }}" max="{{ $anno }}" --}}
                placeholder="Ingrese el turno">
            @error('turno')
                <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Asignatura</label>
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
            <a href="{{ route('parciales.index') }}" class="btn btn-danger">Cancelar</a>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')



@stop
