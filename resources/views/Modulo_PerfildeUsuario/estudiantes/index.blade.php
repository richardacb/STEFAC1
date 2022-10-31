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
            
            <a href="{{ route('estudiantes.export') }}" class="btn btn-danger float-right" role="button">Exportar
                datos de estudiantes</a>
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
                            {{ $e->nombre_estudiante }}
                        </td>
                        <td>{{ $e->anno }}</td>
                        <td>{{ $e->grupo }}</td>
                        <td>
                            <form action="{{ route('estudiantes.destroy', $e->e_id) }}" method="POST"
                                class="eliminar_datos_estudiantes">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger float-right btn-sm mr-2" type="submit"
                                data-bs-toggle="tooltip" data-bs-placement="right"
                                title="Eliminar datos de estudiante"><i class="fa fa-trash-alt"></i></button>

                                <a class="btn btn-primary btn-sm float-right mr-2"
                                    href="{{ route('estudiantes.edit', $e->e_id) }}"><i class="fa fa-edit"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Editar Estudiante"></i></a>
                                <a class="btn btn-success btn-sm float-right mr-2"
                                    href="{{ route('usuarios.show', $e->id) }}" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Mostrar Datos del Estudiante"><i
                                        class="fa fa-user"></i></a>
                               
                            </form>
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
    $(function() {
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
@if (session('info') == 'eliminar-datos-estudiantes')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'Los datos del estudiante se eliminaron con exito.',
            'success'
        )
    </script>
@endif
<script>
    $('.eliminar_datos_estudiantes').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos del estudiante se eliminaran definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection
