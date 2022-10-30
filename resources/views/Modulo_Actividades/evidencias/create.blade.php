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

@include('Modulo_Actividades.evidencias.form')
<a href="{{ route('evidencias.index') }}" class="btn btn-danger">Cancelar</a>
{!! Form::submit('Insertar Evidencia', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
    </div>
</div>
@stop
