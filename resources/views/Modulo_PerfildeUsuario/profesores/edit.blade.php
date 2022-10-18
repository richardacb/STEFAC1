@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar profesores</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
<form action="{{ url('admin/profesores/'.$profesores->id) }}" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre del Profesor:</p>

            <p class="form-control">{{ $profesores->users->primer_nombre }}
                {{ $profesores->users->segundo_nombre }} {{ $profesores->users->primer_apellido }}
                {{ $profesores->users->segundo_apellido }}</p>
            {!! Form::model($profesores, ['route' => ['profesores.update', $profesores->id], 'method' => 'put']) !!}
            @include('Modulo_PerfildeUsuario.profesores.form')
            <a href="{{ route('profesores.index', $profesores->users->id) }}" class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Editar Profesores', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</form>
@stop
    @section('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/profesores.js') }}" defer></script>
    @endsection
