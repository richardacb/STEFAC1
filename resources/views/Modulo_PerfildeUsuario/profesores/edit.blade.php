@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar profesores</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
<form action="{{ url('admin/profesores/' . $profesores->id) }}" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre del Profesor:</p>

            <p class="form-control">{{ $profesores->users->primer_nombre }}
                {{ $profesores->users->segundo_nombre }} {{ $profesores->users->primer_apellido }}
                {{ $profesores->users->segundo_apellido }}</p>
            {!! Form::model($profesores, ['route' => ['profesores.update', $profesores->id], 'method' => 'put']) !!}
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
            <a href="{{ route('profesores.index', $profesores->users->id) }}" class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Editar Profesores', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</form>
@stop
@section('js')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/profesores.js') }}" defer></script>
@endsection
