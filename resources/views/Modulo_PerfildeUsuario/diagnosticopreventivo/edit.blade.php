@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar Diagnostico preventivo</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
<form action="{{ url('admin/diagnosticopreventivo/'.$diagnosticopreventivo->id) }}" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre del estudiante:</p>
           
            <p class="form-control">{{ $diagnosticopreventivo->users->primer_nombre }}
                {{ $diagnosticopreventivo->users->segundo_nombre }} {{ $diagnosticopreventivo->users->primer_apellido }}
                {{ $diagnosticopreventivo->users->segundo_apellido }}</p>   
            {!! Form::model($diagnosticopreventivo, ['route' => ['diagnosticopreventivo.update', $diagnosticopreventivo->id], 'method' => 'put']) !!}
            @include('Modulo_PerfildeUsuario.diagnosticopreventivo.form')
            <a href="{{ route('estudiantes.index', $diagnosticopreventivo->users->id ) }}" class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Editar Diagnostico preventivo', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</form>

@stop