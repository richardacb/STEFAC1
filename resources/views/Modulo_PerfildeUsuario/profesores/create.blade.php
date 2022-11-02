@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Insertar Profesores</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
<div class="card">
    <div class="card-body">
{!! Form::open(['route' => 'profesores.store']) !!}
<div class="col-md-12 col-sm-12">
    {!! Form::label('name', 'Nombre de los profesores:') !!}
    <div class="form-group">
        <select name="user_id" id="user_id" class="form-control mr-sm-2 form-select">
            <option value=" " selected="selected">--Seleccione--</option>
            @foreach ( $users as $user)
            <option value="{{ $user->id }}">
                @role('Vicedecana')
                {{ $user->primer_nombre }} {{ $user->segundo_nombre }} {{ $user->primer_apellido }} {{ $user->segundo_apellido }}
                ( @if ($user->anno == '1')
                Primer Año
            @endif
            @if ($user->anno == '2')
                Segundo Año
            @endif
            @if ($user->anno == '3')
                Tercer Año
            @endif
            @if ($user->anno == '4')
                Cuarto Año
            @endif
            @if ($user->anno == '5')
                Quinto Año
            @endif)
            @else
            {{ $user->primer_nombre }} {{ $user->segundo_nombre }} {{ $user->primer_apellido }}
            {{ $user->segundo_apellido }}
            @endrole
            </option>
            @endforeach
        </select>
        @error('user_id')
        <strong class="error-message text-danger"> {{ 'Campo Requerido' }} </strong>
        @enderror
    </div>
</div>
<div class="row formulario-estudiantes">
    <div class="col-12">
        <fieldset class="fieldset-personalizado">
            <legend class="legend-personalizado">Datos personales del profesor</legend>
            <div class="row">
                <div class="col-sm-12 col-md-6">


                    <div class="form-group">
                        {!! Form::label('name', 'Grupos:') !!}
                        <select name="grupos_id" id="grupos_idprof" class="form-control mr-sm-2 form-select">
                            <option value=" " selected="selected">--Seleccione--</option>
                            @foreach ( $grupos as $grupo)
                            <option value="{{ $grupo->id}} ">
                                {{ $grupo->grupo }}
                            </option>
                            @endforeach
                        </select>
                        @error('grupos_id')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Tipo de clases:') !!}
                        {!! Form::text('tipo_de_clases', null, [
                            'class' => 'form-control',
                            'id' => 'tipo_de_clases',
                            'placeholder' => 'Ingrese el tipo de clase',
                        ]) !!}
                        @error('tipo_de_clases')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                    
                        <div class="form-group">
                            {!! Form::label('name', 'Perído lectivo:') !!}
                            {!! Form::select(
                                'periodo_lectivo',
                                [
                                    '1' => 'Primer Semestre',
                                    '2' => 'Segundo Semestre',
                                    '3' => 'Tercer Semestre',
                                    '4' => 'Cuarto Semestre',
                                    '5' => 'Quinto Semestre',
                                    '6' => 'Sexto Semestre',
                                    '7' => 'Séptimo Semestre',
                                    '8' => 'Octavo Semestre',
                                    '9' => 'Noveno Semestre',
                                    '10' => 'Decimo Semestre',
                                ],
                                null,
                                ['class' => 'form-control', 'id' => 'periodo_lectivo', 'placeholder' => '--Seleccione--'],
                            ) !!}
                            @error('periodo_lectivo')
                                <strong class="error-message text-danger"> {{ $message }} </strong>
                            @enderror
                        </div>
                  
                    <div class="form-group">
                        {!! Form::label('name', 'Asignaturas:') !!}
                        {!! Form::select('asignaturas_id', $asignaturas, null, [
                            'class' => 'form-control',
                            'id' => 'asignaturas_id',
                            'placeholder' => '--Seleccione--',
                        ]) !!}
                        @error('asignaturas_id')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
<a href="{{ route('profesores.index') }}" class="btn btn-danger">Cancelar</a>
{!! Form::submit('Insertar Profesor', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
    </div>
</div>

@stop
    @section('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    {{--  <script src="{{ asset('js/profesores.js') }}" defer></script>  --}}
    @endsection

