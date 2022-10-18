@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Registrar usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
{!! Form::open(['route' => 'grupos.store']) !!}
  @include('Modulo_PerfildeUsuario.grupos.form')
<a href="{{ route('grupos.index') }}" class="btn btn-danger">Cancelar</a>
{!! Form::submit('Insertar Grupo', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
        </div>
    </div>

@stop


