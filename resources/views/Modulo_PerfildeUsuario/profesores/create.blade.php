@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Insertar Profesores</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
<div class="card">
    <div class="card-body">
{!! Form::open(['route' => 'profesores.store']) !!}
<div class="col-md-12 col-sm-12">
    {!! Form::label('name', 'Nombre de los profesores:') !!}
    <div class="form-group">
        <select name="user_id" id="user_id" class="form-control mr-sm-2 form-select">
            <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $users as $user)
            <option value="{{ $user->id }}">
                {{ $user->primer_nombre }} {{ $user->segundo_nombre }} {{ $user->primer_apellido }} {{ $user->segundo_apellido }}
            </option>
            @endforeach
        </select>
        @error('user_id')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
    </div>
</div>
@include('Modulo_PerfildeUsuario.profesores.form')
<a href="{{ route('profesores.index') }}" class="btn btn-danger">Cancelar</a>
{!! Form::submit('Insertar Profesor', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
    </div>
</div>

@stop
    @section('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    {{--  <script src="{{ asset('js/profesores.js') }}" defer></script>  --}}
    @endsection

