@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar Estudiantes</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
<form action="{{ url('admin/estudiantes/' . $estudiantes->id) }}" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre del estudiante:</p>

            <p class="form-control">{{ $estudiantes->users->primer_nombre }}
                {{ $estudiantes->users->segundo_nombre }} {{ $estudiantes->users->primer_apellido }}
                {{ $estudiantes->users->segundo_apellido }}
                ( @if ($estudiantes->users->anno == '1')
                Primer Año
            @endif
            @if ($estudiantes->users->anno == '2')
                Segundo Año
            @endif
            @if ($estudiantes->users->anno == '3')
                Tercer Año
            @endif
            @if ($estudiantes->users->anno == '4')
                Cuarto Año
            @endif
            @if ($estudiantes->users->anno == '5')
                Quinto Año
            @endif)</p>
            {!! Form::model($estudiantes, ['route' => ['estudiantes.update', $estudiantes->id], 'method' => 'put']) !!}
            @include('Modulo_PerfildeUsuario.estudiantes.form')
            <a href="{{ route('estudiantes.index', $estudiantes->users->id) }}" class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Editar Datos del estudiante', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</form>
@stop
@section('js')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/estudiantesperfil.js') }}" defer></script>
@endsection
