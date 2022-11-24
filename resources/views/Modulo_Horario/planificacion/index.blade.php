@extends('adminlte::page')

@section('title', 'Planificaciones')

@section('content_header')

    <div class="container-fluid">
        <h1>Listado de Carga Docente</h1>
        <div class="row">
            <div class="col-xl-12">
                @can('Modulo_Horario.planificacion.create')
                    <a class="btn btn-primary btn-sm float-right" href="{{ route('planificacion.create') }}">Insertar
                        Carga Docente</a>
                @endcan
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg pt-4" id="planificacion">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Profesores</th>
                        <th scope="col">Asignaturas</th>
                        <th scope="col">Grupos</th>

                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($planificaciones as $p)
                        <tr>
                            <td scope="row">
                                {{ $p->normbre_prof }}
                            </td>
                            <td>
                                {{ $p->asignatura }}
                            </td>
                            <td>
                                {{ $p->grupo }}
                            </td>

                            <td width="150px">
                                <form action="{{ route('planificacion.destroy', $p->id) }}" method="POST"
                                    class="eliminar-planificacion">
                                    @csrf
                                    @method('delete')
                                    @can('Modulo_Horario.planificacion.edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('planificacion.edit', $p->id) }}"
                                            data-bs-toggle="tooltip" data-bs-placement="right" title="Editar Carga Docente"><i
                                                class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('Modulo_Horario.planificacion.destroy')
                                        <button class="btn btn-danger btn-sm" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Eliminar Carga Docente"><i
                                                class="fa fa-trash-alt"></i></button>
                                    @endcan
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
@section('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#planificacion').DataTable({
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
    @if (session('info') == 'eliminar-planificacion')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Carga Docente eliminada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-planificacion')
        <script>
            Swal.fire(
                '¡Insertada!',
                'Carga Docente Insertada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-planificacion')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Carga Docente Editada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'importar-planificacion')
        <script>
            Swal.fire(
                'Insertada!',
                'Carga Docente Insertada.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.eliminar-planificacion').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Está seguro que desea eliminar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
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
