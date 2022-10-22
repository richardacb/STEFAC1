@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Lista de profesores</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

<div class="card">
    <div class="card-header">
@can('Modulo_PerfildeUsuario.profesores.create')
     <a href="{{ route('profesores.create') }}" class="btn btn-primary ">Insertar profesor</a>
@endcan

{{-- @can('Import.ProfesoresImport')
    <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                data-target=".bd-example-modal-lg">Importar datos de profesores</button>
@endcan --}}

    </div>
    <div class="card-body">
        <table id="profesores_id" class="table table-striped shadow-lg">
            <thead class="bg-primary text-white">
                <tr>

                    <th>Nombre y Apellido</th>
                    <th>Año</th>
                    <th>Guia de:</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesores as $profesor)
                    <tr>
                        <td>{{ $profesor->users->primer_nombre }}
                            {{ $profesor->users->segundo_nombre }} {{ $profesor->users->primer_apellido }}
                            {{ $profesor->users->segundo_apellido }}
                            </td>
                        <td>{{ $profesor->users->anno }}</td>
                        <td>{{ $profesor->grupos->name }}</td>

                        <td width="120px">
                            @can('Modulo_PerfildeUsuario.profesores.edit')
                                 <a class="btn btn-primary btn-sm float-right" href="{{ route('profesores.edit', $profesor->id) }}"><i class="fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="right" title="Editar Profesor"></i></a>
                            @endcan
                            <a class="btn btn-success btn-sm float-right mr-2" href="{{ route('usuarios.show', $profesor->users->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Mostrar Datos del Profesor"><i
                                class="fa fa-user"></i></a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- <!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Importar datos de profesores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profesores.import') }}" method="POST"
                     enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="import_file" />
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Importar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Fin Modal --> --}}
@stop

@section('js')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#profesores_id').DataTable({
            language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
        });
    });
</script>
<script src="{{ asset('js/sweetalert2@11.js') }}"></script>

@if (session('info') == 'adicionar-profesor')
<script>
Swal.fire(
      '¡Insertado!',
      'El profesor se inserto con exito.',
      'success'
    )
</script>
@endif
@if (session('info') == 'modificar-profesor')
<script>
Swal.fire(
      '¡Modificado!',
      'El profesor se modifico con exito.',
      'success'
    )
</script>
@endif
@if (session('info') == 'importar-profesor')
<script>
Swal.fire(
      '¡Importado!',
      'Los profesores se importaron con exito.',
      'success'
    )
</script>
@endif

@endsection
