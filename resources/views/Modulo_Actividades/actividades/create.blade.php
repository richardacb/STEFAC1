@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Insertar Actividad</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
<div class="card">
    <div class="card-body">
{!! Form::open(['route' => 'actividades.store']) !!}
@include('Modulo_Actividades.actividades.form')
<a href="{{ route('actividades.index') }}" class="btn btn-danger">Cancelar</a>
{!! Form::submit('Insertar Actividad', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
    </div>
</div>
@stop
