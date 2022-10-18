@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Asignar Diagnostico preventivo</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endsection

<div class="card">
    <div class="card-body">

        {!! Form::open(['route' => 'diagnosticopreventivo.store']) !!}
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <select name="user_id" id="user_id" class="form-control mr-sm-2 form-select">
                    <option value="0" selected="selected">--Seleccione--</option>
                    @foreach ( $users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->nombre_estudiante }}
                    </option>
                    @endforeach
                </select>
                @error('user_id')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            </div>
        </div>
        @include('Modulo_PerfildeUsuario.diagnosticopreventivo.form')
        <a href="{{ route('diagnosticopreventivo.index') }}" class="btn btn-danger">Cancelar</a>
        {!! Form::submit('Asignar Diagnostico preventivo', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@section('js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
@endsection


@stop
