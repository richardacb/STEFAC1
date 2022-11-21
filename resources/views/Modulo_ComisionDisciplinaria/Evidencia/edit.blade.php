@extends('adminlte::page')

@section('title', 'Modificar  Evidencia')

@section('content_header')
    <h1>Modificar Evidencia</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<form action="/admin/Evidencia/{{ $evidencia->id  }}" method="POST"enctype="multipart/form-data">
    @csrf
    @method('PUT') 

    <div class="mb-3">
        <label for="" class="form-label">Subir Imagen </label><br>
       
        
        <input type="file"  style="width : 500px;   id="Imagen" name="Imagen">
       
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Subir Video</label><br>
        
        <input type="file" style="width : 500px;   id="Video" name="Video" value="{{ $evidencia->Video}}">
       
      </div>
      
      

    
      <div class="mb-3">
        <label for="" class="form-label">Expediente:</label><br>
        <select name="id_expediente" id="id_expediente" class="form-control mr-sm-2 form-select"style="width : 500px;>
        <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $expediente as $na)
            <option value="{{ $na->id }}">
                {{ $na->id }}
            </option>
           
            @endforeach
        </select>
        
      </div>
      
      
      
      <div class="mb-3">
          <a href="{{ route('Evidencia.index') }}" class="btn btn-danger btn-sm">Cancelar</a>
          <input type="submit" class="btn btn-primary btn-sm" value="Editar">
      </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
