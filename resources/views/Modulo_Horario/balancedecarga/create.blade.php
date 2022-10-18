@extends('adminlte::page')

@section('title', 'Crear Horario')

@section('content_header')
    <h1>Crear Balance de Carga</h1>
@stop

@section('content')

@if(session('mensaje'))
<div class="alert alert-success">
<p>{{ session('mensaje') }}</p>
</div>
@endif

<form action="{{ route('balancedecarga.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Asignatura A Impartir</label>
        <br>
        <select name="asignaturas_id" id="asignaturas_id" class="form-control mr-sm-2 form-select">
            <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $nombreasignaturas as $na)
            @if($na->anno >= 1 || $na->anno <= 5)
            <option value="{{ $na->id }}">
                {{ $na->nombre }}
            </option>
            @endif
            @endforeach
        </select>
        @error('asignaturas_id')
        <strong class="error-message text-danger"> {{ "Campos Requeridos" }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Frecuencia de Clases</label>
        <input type="text" class="form-control" id="frecuencia" name="frecuencia" placeholder="Ingrese el número de frecuencias semanal">
        @error('frecuencia')
        <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
    </div>
      <div class="mb-3">
        <label for="" class="form-label">Tipo de Clases</label>
        <input type="text" class="form-control" id="tipo_clase" name="tipo_clase" placeholder="Ingrese el tipo de clases, o los tipos de clases separados por coma">
        @error('tipo_clase')
        <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Semana de Clases</label>
        <input type="text" class="form-control" id="semana" name="semana" placeholder="Ingrese el número de la Semana de Clase Ejemplo: 1">
        @error('semana')
        <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
          <a href="{{ route('balancedecarga.index') }}" class="btn btn-danger">Cancelar</a>
          <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
</form>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

 <script src="{{ asset('js/myjs.js') }}" defer></script>
 @stop
