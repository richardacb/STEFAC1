@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Lista de Estudiantes</h1>

@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

<div class="card">
    <div class="col-md-12">
        <div class="card-header">
            @can('Modulo_PerfildeUsuario.estudiantes.create')
                <a href="{{ route('estudiantes.create') }}" class="btn btn-primary ">Insertar datos al estudiante</a>
            @endcan

            {{--  @can('Import.EstudiantesImport')
                <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                    data-target=".importar_estudiantes">Importar datos de estudiates</button>
            @endcan  --}}
        </div>
    </div>

    <div class="card-body">
        <table id="estudiantes_id" class="table table-striped shadow-lg w-100">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nombre y Apellidos</th>
                    <th>Año Academico</th>
                    <th>Grupo</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $e)
                    <tr>
                        <td>
                            {{ $e->users->primer_nombre }}
                            {{ $e->users->segundo_nombre }} {{ $e->users->primer_apellido }}
                            {{ $e->users->segundo_apellido }}
                        </td>
                        <td>{{ $e->anno }}</td>
                        <td>{{ $e->grupos->name }}</td>
                        <td>
                        <a class="btn btn-primary btn-sm float-right" href="{{ route('estudiantes.edit', $e->id) }}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-success btn-sm float-right mr-2" href="{{ route('usuarios.show', $e->users->id) }}"><i
                            class="fa fa-user"></i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{--  @include('Modulo_PerfildeUsuario.estudiantes.modal')  --}}
@stop

@section('js')
<script src="{{ asset('js/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>


<script>
    $(document).ready(function() {
        $('#estudiantes_id').DataTable({
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

@if (session('info') == 'adicionar-datos-estudiante')
    <script>
        Swal.fire(
            'Asignado!',
            'Datos asignados con exito.',
            'success'
        )
    </script>
@endif
@endsection
