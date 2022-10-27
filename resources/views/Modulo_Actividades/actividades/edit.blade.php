@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar Actividades</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
    <div class="card">
        <div class="card-body">
            {!! Form::model($actividades, ['route' => ['actividades.update', $actividades], 'method' => 'put']) !!}
            @include('Modulo_Actividades.actividades.form')
            <a href="{{ route('actividades.index', $actividades->id ) }}" class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Editar Actividades', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
