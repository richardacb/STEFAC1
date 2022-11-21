@extends('adminlte::page')

@section('title', 'Crear Declaración')

@section('content_header')
    <h1>Crear Declaración</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<form action="{{ route('Declaraciones.store') }}" method="POST">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Declarante</label><br>
        <input type="text" style="width : 500px;  class="form-control" id="Nombre_declarante" name="Nombre_declarante" placeholder="Ingrese el nombre y apellidos del declarante"value="{{'old'('Nombre_declarante')}}">
        @error('Nombre_declarante')
        <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
      </div>
    
      <div class="mb-3">
        <label for="" class="form-label">Tipo de declarante</label>
        <br> <br>
        <select name="cargo"value="{{'old'('cargo')}}">
  
        <option value="Denunciado">Denunciado</option> 
        <option value="Denunciante">Denunciante</option> 
        <option value="Testigo">Testigo</option>
       </select><br>
         @error('cargo')
         <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Declaración de los hechos</label><br>
        <textarea name="declaracion_hechos" id="declaracion_hechos" cols="30" rows="10"placeholder="Ingrese la declaración de los hechos"value="{{'old'('declaracion_hechos')}}"></textarea> 
        @error('declaracion_hechos')
        <strong class="error-message text-danger"> {{ "$message" }} </strong>
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
          <a href="{{ route('Comision_disciplinaria.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
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
