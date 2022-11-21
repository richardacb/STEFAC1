@extends('adminlte::page')

@section('title', 'Crear Comision Disciplinaria')

@section('content_header')
    <h1>Crear Comisión Disciplinaria</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<form action="{{ route('Comision_disciplinaria.store') }}" method="POST">

    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label><br>
        <input type="text" style="width : 500px; heigth : 70px class="form-control" id="Nombre_comision" name="Nombre_comision" placeholder="Ingrese el nombre de la Comisión"value="{{'old'('Nombre_comision')}}">
        @error('Nombre_comision')
            <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Nombre y Apellidos del Presidente</label><br>
        <input type="text" style="width : 500px; heigth : 70px  class="form-control" id="Presidente" name="Presidente" placeholder="Ingrese el nombre y apellidos del Presidente de la comisión" value="{{'old'('Presidente')}}">
        @error('Presidente')
        <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="" class="form-label"> Nombre y Apellidos del Secretario</label><br>
        <input type="text" style="width : 500px; heigth : 70px class="form-control" id="Miembro" name="Miembro"  placeholder="Ingrese el nombre y apellidos del Secretario de la comisión" value="{{'old'('Miembro')}}">
       @error('Miembro')
            <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label"> Nombre y Apellidos del Miembro</label><br>
        <input type="text" style="width : 500px; heigth : 70px class="form-control" id="miemb" name="miemb"  placeholder="Ingrese el nombre y apellidos del Miembro de la comisión" value="{{'old'('miemb')}}">
       @error('miemb')
            <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
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


