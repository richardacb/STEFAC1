@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Asignar rol</h1>
@stop

@section('content')


<form action="{{ url('usuarios/'.$users->id) }}" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $users->primer_nombre }} {{ $users->segundo_nombre }} {{ $users->primer_apellido }} {{ $users->segundo_apellido }}</p>
            <h2 class="h5">Listado de roles</h2>
            {!! Form::model($users, ['route' => ['usuarios.update',$users->id], 'method' => 'put']) !!}
            @foreach ($roles as $role)
            <div>
                <label>
                    {!! Form::checkbox('roles[]', $role->id, null,['class' => 'mr-1']) !!}
                    {{$role->name}}
                </label>
            </div>

            @endforeach
            <hr>
            @can('Modulo_PerfildeUsuario.usuarios.update')
            <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary']) !!}
            @endcan

            {!! Form::close() !!}
        </div>
    </div>
</form>
@stop

