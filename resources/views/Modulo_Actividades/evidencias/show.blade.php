@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Evidencia</h1>
@stop

@section('content')

<section class="section profile">
<div class="tab-pane fade show active perfil">

    <h5 class="card-title ml-5 my-2">Detalles de la Evidencia</h5>
    <br>
    <hr width="90%">
    <div class="row">
        <div class="col-lg-3 col-md-4 label ">Nombre:</div>
        @foreach ($users as $user )
        @if ($evidencia->user_id == $user->id)
        <div class="col-lg-9 col-md-8">{{$user-> primer_nombre}} {{$user-> segundo_nombre}}</div>
        @endif
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label ">Apellidos:</div>
        @foreach ($users as $user )
        @if ($evidencia->user_id == $user->id)
        <div class="col-lg-9 col-md-8">{{$user-> primer_apellido}} {{$user-> segundo_apellido}}</div>
        @endif
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label">Actividad:</div>
        @foreach ( $actividades as $actividad )
        @if ($evidencia->actividades_id == $actividad->id)
        <div class="col-lg-9 col-md-8">{{ $actividad->nombre }}</div>
        @endif
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label">Año Actividad:</div>
        @foreach ( $actividades as $actividad )
        @if ($evidencia->actividades_id == $actividad->id)
        <div class="col-lg-9 col-md-8">{{ $actividad->año }}</div>
        @endif
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 label">Evidencia:</div>
        <div class="col-lg-9 col-md-8">{{ $evidencia->descripcion }}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label">Tipo de Evidencia:</div>
        @if ($evidencia->estado == 1)
        <div class="col-lg-9 col-md-8">Positiva</div>
        @elseif ($evidencia->estado == 2)
        <div class="col-lg-9 col-md-8">Negativa</div>
        @endif
    </div>
    <br>
    <div class="row">
        <div class="col-lg-3 col-md-4 label">Imagen:</div>
        <div class="col-lg-9 col-md-8"><img src="/imagen/{{ $evidencia->imagen}}" width="60%" class="border px-14 py-1"></div>
    </div>

</div>
</section>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@stop

@section('js')

@stop
