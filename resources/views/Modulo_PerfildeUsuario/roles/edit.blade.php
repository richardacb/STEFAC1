@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($roles, ['route' => ['roles.update', $roles], 'method' => 'put']) !!}
            @include('Modulo_PerfildeUsuario.roles.form')
            <hr>
            <a href="{{ route('roles.index') }}" class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Editar Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop