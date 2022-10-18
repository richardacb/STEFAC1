@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar Grupos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($grupos, ['route' => ['grupos.update', $grupos], 'method' => 'put']) !!}
            @include('Modulo_PerfildeUsuario.grupos.form')
            <a href="{{ route('grupos.index') }}" class="btn btn-danger">Cancel</a>
            {!! Form::submit('Editar Grupo', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('js')
