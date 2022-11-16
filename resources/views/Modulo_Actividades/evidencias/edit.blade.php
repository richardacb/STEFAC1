@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar Evidencia</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
    <div class="card">
        <div class="card-body">
            {!! Form::model($evidencias, ['route' => ['evidencias.update', $evidencias], 'method' => 'put', 'files'=>'true', ]) !!}
            @include('Modulo_Actividades.evidencias.form')
            <a href="{{ route('evidencias.index', $evidencias->id ) }}" class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Editar Evidencias', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

