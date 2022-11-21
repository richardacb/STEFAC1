@extends('adminlte::page')

@section('title', 'Modificar Comision Disciplinaria')

@section('content_header')
    <h1>Modificar Comision Disciplinaria</h1>
@stop
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
@if (session('info'))
    <div class="alert alert-succes">
        <strong>{{ session('info') }}</strong>
    </div>
    @endif




<form action="/admin/Comision_disciplinaria/{{ $comision_disciplinaria->id  }} " method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre de la Comisión</label><br>
        <input type="text" style="width : 500px; class="form-control" id="Nombre_comision" name="Nombre_comision" placeholder="Ingrese el nombre de la Comisión" value="{{ $comision_disciplinaria->Nombre_comision }}"><br>
        @error('Nombre_comision')
        <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
      </div><br>
      <div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Presidente</label><br>

        <input type="text" style="width : 500px;  class="form-control" id="Presidente" name="Presidente" placeholder="Ingrese el nombre del Presidente" value="{{ $comision_disciplinaria->Presidente }}"><br>
        @error('Presidente')
        <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
        </div><br>
      
      <div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Secretario</label><br>
        <input type="text"style="width : 500px;  class="form-control" id="Miembro" name="Miembro" placeholder="Ingrese el nombre y apellidos del Miembro de la comision" value="{{ $comision_disciplinaria->Miembro }}"><br>
        @error('Miembro')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div><br>
      <div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Miembro</label><br>
        <input type="text"style="width : 500px;  class="form-control" id="miemb" name="miemb" placeholder="Ingrese el nombre y apellidos del Miembro de la comision" value="{{ $comision_disciplinaria->miemb }}"><br>
        @error('miemb')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div><br>
      

      </div>
      <div class="mb-3">
          <a href="{{ route('Comision_disciplinaria.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
          <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-plus-circle"></i></button>
      </div>
</form>
@stop

@section('js')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#comision_id').DataTable({
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ Registros por Página",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "first": "Primero",
                    "last": "Último",
                }
            }
        });
    });
</script>
@endsection
