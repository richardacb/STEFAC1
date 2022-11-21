@extends('adminlte::page')

@section('title', 'Crear  Evidencia')

@section('content_header')
    <h1>Crear Evidencia</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<form action="{{ route('Evidencia.store') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Subir Imagen</label><br>
        <input type="file" style="width : 500px;  class="form-control" id="Imagen" name="Imagen">
       
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Subir Video</label><br>
        <input type="file" style="width : 500px;  class="form-control" id="Video" name="Video">
       
      </div>
      
      

    
      <div class="mb-3">
        <label for="" class="form-label">Expediente:</label><br>
        <select name="id_expediente" id="id_expediente" class="form-control mr-sm-2 form-select"style="width : 500px;>
        <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $expediente as $na)
            <option value="{{ $na->id }}">
              Expediente:  {{ $na->id }} Denuncia: {{ $na->id_denuncia }}
            </option>
           
            @endforeach
        </select>
        
      </div>
      
      
      
      <div class="mb-3">
          <a href="{{ route('Evidencia.index') }}" class="btn btn-danger btn-sm">Cancelar</a>
          <input type="submit" class="btn btn-primary btn-sm" value="Crear">
      </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
