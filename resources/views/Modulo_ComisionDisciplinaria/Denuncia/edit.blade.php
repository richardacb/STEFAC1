@extends('adminlte::page')

@section('title', 'Modificar denuncia')

@section('content_header')
    <h1>Modificar denuncia</h1>
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


<form action="/admin/Denuncia/{{ $denuncia->id  }}" method="POST">
    @csrf
    @method('PUT')
<div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Denunciante</label><br>
        <input type="text"style="width : 500px; heigth : 70px class="form-control" id="Nombre_denunciante" name="Nombre_denunciante" value="{{ $denuncia->Nombre_denunciante }}">
        @error('Nombre y Apellidos del Denunciante')
        <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Descripcion</label><br>
        <input type="text" style="width : 500px; heigth : 70pxclass="form-control" id="descripcion" name="descripcion" value="{{ $denuncia->descripcion }}">
        @error('Descripcion')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
     
            
      

      <div class="mb-3">
        <label for="" class="form-label">Asignar a Comision Disciplinaria</label><br>
       
        <select name="id_comision" id="id_comision"style="width : 500px; heigth : 90px class="form-control mr-sm-2 form-select">
            @foreach ( $nombrecomision as $na)
            @if ($na->id === $denuncia->id_comision)
            <option value="{{ $na->id }}">
                {{ $na->Nombre_comision }}
            </option>
            @endif
            @endforeach
            @foreach ( $nombrecomision as $na)
            @if ($na->id !== $denuncia->id_comision)
            <option value="{{ $na->id }}">
                {{ $na->Nombre_comision }}
            </option>
            @endif
            @endforeach
        </select>
        @error('id_comision')
                <strong class="error-message text-danger"> {{ "$message" }} </strong>
            @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Estado de la denuncia:</label>
        <br> <br>
        <select name="estado" id="estado"style="width : 500px; heigth : 90px class="form-control mr-sm-2 form-select">
      
        <option value="{{$denuncia->estado}}">{{$denuncia->estado}}</option> 
          
        <option value="Nueva">Nueva</option> 
        <option value="En proceso">En proceso</option> 
        <option value="Finalizada">Finalizada</option>       
       
        </select><br>
        <strong class=" text-success"> *Se considera una denuncia en proceso si se le crean sus denunciados y se le asigna una comisión. </strong><br>
        <strong class=" text-success"> *Se considera una denuncia finalizada si se realizó el dictámen del expediente de los denunciados involucrados. </strong> <br><br>
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


      