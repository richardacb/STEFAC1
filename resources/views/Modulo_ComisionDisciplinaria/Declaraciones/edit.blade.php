@extends('adminlte::page')

@section('title', 'Modificar declaración')

@section('content_header')
    <h1>Modificar declaración</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection

@if(session('mensaje'))
<div class="alert alert-success">
<p>{{ session('mensaje') }}</p>
</div>
@endif


<form action="/admin/Declaraciones/{{ $declaraciones->id  }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Declarante</label>
        <input type="text" class="form-control" id="Nombre_declarante" name="Nombre_declarante"style="width : 500px; heigth : 90px placeholder="Ingrese el nombre y apellidos del declarante" value="{{ $declaraciones->Nombre_declarante }}">
        @error('Nombre y Apellidos del Declarante')
        <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Tipo de declarante</label>
        <br> <br>
        <select name="cargo">
        <option value="{{$declaraciones->cargo}}">{{$declaraciones->cargo}}</option> 
        <option value="Denunciado">Denunciado</option> 
        <option value="Denunciante">Denunciante</option> 
        <option value="Testigo">Testigo</option>
       </select><br>
         @error('cargo')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Declaración de los hechos</label>
        <input type="text" class="form-control" id="declaracion_hechos" name="declaracion_hechos" style="width : 500px; heigth : 90px placeholder="Ingrese el nombre y apellidos del denunciado" value="{{ $declaraciones->declaracion_hechos }}">
        @error('Declaracion_hechos')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Expediente:</label>
        <br>
        <select name="id_expediente" id="id_expediente" style="width : 500px; heigth : 90px class="form-control mr-sm-2 form-select">
       
            @foreach ( $expediente as $na)
            <option value="{{ $na->id }}">
                {{ $na->id }}
            </option>
           
            @endforeach
        </select>
        
      </div>
      <div class="mb-3">
          <a href="{{ route('Declaraciones.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
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