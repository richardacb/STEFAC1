@extends('adminlte::page')

@section('title', 'Gestionar Afectaciones Docentes')

@section('content_header')

    <div class="container-fluid">
        <h1>Listado de Afectaciones</h1>
        <div class="row">
            <div class="col-xl-12">
                @can('Modulo_Horario.afectaciones.create')
                    <a class="btn btn-primary btn-sm float-right" href="{{ route('afectaciones.create') }}">Insertar
                        Afectación</a>
                @endcan
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped shadow-lg pt-4" id="afect">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Profesor Afectado</th>
                                    <th>Año</th>
                                    <th>Semana</th>
                                    <th>Dia</th>
                                    <th>Turno</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($afectaciones as $a)
                                    <tr>
                                        <td>{{ $a->afectado }}</td>
                                        <td>{{ $a->anno }}</td>
                                        <td>{{ $a->semana }}</td>
                                        <td>{{ $a->dia }}</td>
                                        <td>{{ $a->turno }}</td>
                                        <td width="150px">
                                            <form action="{{ route('afectaciones.destroy', $a->id) }}" method="POST"
                                                class="eliminar-afectacion">
                                                @csrf
                                                @method('delete')
                                                @can('Modulo_Horario.afectaciones.edit')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('afectaciones.edit', $a->id) }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="right" title="Editar Afectación"><i
                                                            class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Modulo_Horario.afectaciones.destroy')
                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                                        title="Eliminar Afectación"><i class="fa fa-trash-alt"></i></button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#afect').DataTable({
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
    @if (session('info') == 'eliminar-afectacion')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Datos eliminados.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-afectacion')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Afectación Insertada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-afectacion')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Afectación Editada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'importar-afectacion')
        <script>
            Swal.fire(
                'Insertada!',
                'Afectación Insertada con Éxito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.eliminar-afectacion').submit(function(e) {
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
