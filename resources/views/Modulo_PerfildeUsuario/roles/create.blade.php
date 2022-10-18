@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Insertar role</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
{!! Form::open(['route' => 'roles.store']) !!}
@include('Modulo_PerfildeUsuario.roles.form')
<a href="{{ route('roles.index') }}" class="btn btn-danger">Cancelar</a>
{!! Form::submit('Insertar Rol', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
    </div>
</div>
   
@stop

