@extends('adminlte::page')

@section('title', 'Modificar opinión')

@section('content_header')
    <h1>Modificar opinión</h1>
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


<form action="/admin/Opiniones/{{ $opiniones->id  }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Opinante</label><br>
        <input type="text"style="width : 500px; class="form-control" id="Nombre" name="Nombre" value="{{ $opiniones->Nombre }}">
        @error('Nombre')
        <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Responsabilidad</label>
        <br> <br>
        <select name="responsabilidad">
        <option value="{{$opiniones->responsabilidad}}">{{$opiniones->responsabilidad}}</option> 
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
        <label for="" class="form-label">Opinión</label><br>
        <input type="text" style="width : 500px;class="form-control" id="descripcion" name="descripcion" value="{{ $opiniones->descripcion }}">
        @error('descripcion')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Expediente:</label><br>
        <br>
        <select name="id_expediente" id="id_expediente" style="width : 500px; class="form-control mr-sm-2 form-select">
       
            @foreach ( $expediente as $na)
            <option value="{{ $na->id }}">
                {{ $na->id }}
            </option>
           
            @endforeach
        </select>
        
      </div>
      <div class="mb-3">
          <a href="{{ route('Opiniones.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
          <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-plus-circle"></i></button>
      </div>
</form>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

 <script src="{{ asset('js/myjs.js') }}" defer></script>
 @stop

      