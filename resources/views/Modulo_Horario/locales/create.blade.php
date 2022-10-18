@extends('adminlte::page')

@section('title', 'Locales')

@section('content_header')
<h1>Insertar Local</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
<form action="{{ route('locales.store') }}" method="POST">

    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Local</label>
        <input type="text" class="form-control" id="local" name="local" placeholder="Ingrese el Local">
        @error('local')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
    <div class="mb-3">
        <label for="" class="form-label">Tipo de Local</label>
        <select name="tipo_de_locales" id="tipo_de_locales" class="form-control mr-sm-2 form-select">
            <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $tipo_de_locales as $t)
            <option value="{{ $t->id }}">
                {{ $t->tipo }}
            </option>
            @endforeach
        </select>
        @error('tipo_de_locales')
        <strong class="error-message text-danger"> {{ "Campos Requeridos" }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Disponibilidad</label>
        <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" placeholder="Ingrese 1 si el local esta disponible, 0 sino lo está.">
        @error('disponibilidad')
        <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>

      <div class="mb-3">
          <a href="{{ route('asignaturas.index') }}" class="btn btn-danger">Cancelar</a>
          <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
</form>
    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif


@stop
@section('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#asig').DataTable({
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
