@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Insertar Evidencia</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
<div class="card">
    <div class="card-body">
{!! Form::open(['route' => 'evidencias.store', 'files'=>'true'] ) !!}

    @if ($users)
    <div class="col-md-12 col-sm-12">
        {!! Form::label('name', 'Nombre de los estudiantes:') !!}
    <div class="form-group">
        <select name="user_id" id="user_id" class="form-control mr-sm-2 form-select">
            <option value="0" selected="selected">--Seleccione--</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->nombre_estudiante}}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
    </div>
</div>
    @endif


@include('Modulo_Actividades.evidencias.form')
<a href="{{ route('evidencias.index') }}" class="btn btn-danger">Cancelar</a>
{!! Form::submit('Insertar Evidencia', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
    </div>
</div>
@stop
