@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Lista de Diagnósticos preventivos</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">

@endsection
<div class="card">
    <div class="card-header ">
        @can('Modulo_PerfildeUsuario.diagnosticopreventivo.create')
            <a href="{{ route('diagnosticopreventivo.create') }}" class="btn btn-primary ">Insertar diagnóstico</a>
        @endcan
        <nav class="navbar navbar-expand-lg navbar-light bg-light float-right ">
            <i class="fa fa-chart-pie fa-lg "></i>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            --Seleccione Resporte Estadistico--
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#grafica_reportes1">Adicciones de los
                                estudiantes</a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#grafica_reportes2">Tipo de medicamentos que
                                consumen</a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#grafica_reportes3">Grupo Social al que
                                pertenecen</a>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#grafica_reportes3">Creencia Religiosa al
                                que pertenecen</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="card-body">
        <table id="diagnosticopreventivo_id" class="table table-striped shadow-lg w-100">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nombre y Apellido</th>
                    <th>Año</th>
                    <th>Grupo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosticopreventivo as $dp)
                    <tr>
                        <td>{{ $dp->nombre_estudiante }}</td>
                        <td>
                            @if ($dp->anno == '1')
                            Primer Año
                        @endif
                        @if ($dp->anno == '2')
                            Segundo Año
                        @endif
                        @if ($dp->anno == '3')
                            Tercer Año
                        @endif
                        @if ($dp->anno == '4')
                            Cuarto Año
                        @endif
                        @if ($dp->anno == '5')
                            Quinto Año
                        @endif</td>
                        <td>{{ $dp->grupo }}</td>
                        <td>
                             <form action="{{ route('diagnosticopreventivo.destroy', $dp->dp_id) }}" method="POST"
                                class="eliminar_datos_diagnosticopreventivo">
                                @csrf
                                @method('delete')
                                @can('Modulo_PerfildeUsuario.diagnosticopreventivo.destroy')
                                <button class="btn btn-danger float-right btn-sm mr-2" type="submit"
                                data-bs-toggle="tooltip" data-bs-placement="right"
                                title="Eliminar datos del diagnostico preventivo"><i class="fa fa-trash-alt"></i></button>
                                 @endcan
                                @can('Modulo_PerfildeUsuario.diagnosticopreventivo.edit')
                            <a class="btn btn-primary btn-sm float-right mr-2"
                                href="{{ route('diagnosticopreventivo.edit', $dp->dp_id) }}"><i class="fa fa-edit"
                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Editar Diagnóstico Preventivo"></i></a>
                                     @endcan
                                @can('Modulo_PerfildeUsuario.diagnosticopreventivo.create')
                            <a class="btn btn-success btn-sm float-right mr-2"
                                href="{{ route('usuarios.show', $dp->user_id) }}" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Mostar Datos del Diagnóstico"><i
                                    class="fa fa-user"></i></a>
                                     @endcan
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Map card -->


@include('Modulo_PerfildeUsuario.diagnosticopreventivo.reportes')

<!-- /.card -->
@stop

@section('js')
<script src="{{ asset('js/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>


<script>
    $(document).ready(function() {
        $('#diagnosticopreventivo_id').DataTable({
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

@if (session('info') == 'adicionar-diagnostico-estudiantes')
    <script>
        Swal.fire(
            'Asignado!',
            'El diagnostico se asigno con exito.',
            'success'
        )
    </script>
@endif
@if (session('info') == 'eliminar-datos-diagnosticopreventivo')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'Los datos del diagnostico preventivo se eliminaron con exito.',
            'success'
        )
    </script>
@endif
<script>
    $('.eliminar_datos_diagnosticopreventivo').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos del diagnostico preventivo se eliminaran definitivamente",
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
