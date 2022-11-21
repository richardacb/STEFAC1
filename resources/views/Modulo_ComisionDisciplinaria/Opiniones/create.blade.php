@extends('adminlte::page')

@section('title', 'Crear Opinión')

@section('content_header')
    <h1>Crear Opinión</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<form action="{{ route('Opiniones.store') }}" method="POST">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Opinante</label><br>
        <input type="text" style="width : 500px;  class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre y apellidos del opinante" value="{{'old'('Nombre')}}">
        @error('Nombre')
        <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Responsabilidad o cargo</label>
        <br> <br>
        <select name="responsabilidad" value="{{'old'('responsbilidad')}}">
       
        <option value="Profesor Guía">Profesor Guía</option> 
        <option value="Profesor Principal">Profesor Principal</option> 
        <option value="FEU">FEU</option>
        <option value="UJC">UJC</option>
       </select><br>
         @error('responsabilidad')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Decripción de la opinión</label><br>
        <input type="text" style="width : 500px; class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción de la opinión" value="{{'old'('descripcion')}}">
        @error('descripcion')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Expediente:</label><br>
        <select name="id_expediente" id="id_expediente" class="form-control mr-sm-2 form-select"style="width : 500px;>
        <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $expediente as $na)
            <option value="{{ $na->id }}">
             Expediente: {{ $na->id }} Denuncia: {{ $na->id_denuncia }}
            </option>
           
            @endforeach
        </select>
        
      </div>
      
      
      
      <div class="mb-3">
          <a href="{{ route('Opiniones.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
          <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-plus-circle"></i></button>
      </div>
      
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
