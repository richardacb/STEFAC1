@extends('adminlte::page')

@section('title', 'Crear Denuncia')

@section('content_header')
    <h1>Crear Denuncia</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<form action="{{ route('Denuncia.store') }}" method="POST">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Denunciante</label><br>
        <input type="text" style="width : 500px; heigth : 70px class="form-control" id="Nombre_denunciante" name="Nombre_denunciante" placeholder="Ingrese el nombre y apellidos del denunciante"value="{{'old'('Nombre_denunciante')}}">
        @error('Nombre_denunciante')
        <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Descripción de la denuncia</label><br>
        <input type="textarea" style="width : 500px; heigth : 70px class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion de los hechos"value="{{'old'('descripcion')}}">
        @error('descripcion')
            <strong class="error-message text-danger"> {{ "$message"}} </strong>
        @enderror
      </div>
   
      <div class="mb-3">
        <label for="" class="form-label">Estado de la denuncia:</label>
        <br> <br>
        <select name="estado">
  
        <option value="Nueva">Nueva</option> 
        
        
        </select><br>
         @error('estado')
         <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
      </div>
      
      

      
      
     
     
      <div class="mb-3">
          <a href="{{ route('Denuncia.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
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

 