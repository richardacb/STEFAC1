@extends('adminlte::page')

@section('title', 'Locales')

@section('content_header')

    <div class="container-fluid">
        <h1>Listado de Locales</h1>
        <div class="row">
            <div class="col-xl-12">
                @can('Modulo_Horario.locales.create')
                    <a class="btn btn-primary btn-sm float-right" href="{{ route('locales.create') }}">Insertar
                        Local</a>
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
                        <table class="table table-striped shadow-lg pt-4" id="locales">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo de Local</th>
                                    <th>Disponibilidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locales as $l)
                                    <tr>
                                        <td>{{ $l->local }}</td>
                                        <td>{{ $l->tipo }}</td>
                                        <td>{{ $l->disponibilidad }}</td>
                                        <td width="150px">
                                            <form action="{{ route('locales.destroy', $l->id) }}" method="POST"
                                                class="eliminar-local">
                                                @csrf
                                                @method('delete')
                                                @can('Modulo_Horario.locales.edit')
                                                    <a class="btn btn-primary btn-sm" href="{{ route('locales.edit', $l->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                                        title="Editar Local"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Modulo_Horario.locales.destroy')
                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                                        title="Eliminar Local"><i class="fa fa-trash-alt"></i></button>
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
            $('#locales').DataTable({
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
    @if (session('info') == 'eliminar-local')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Local eliminado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-local')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Local Insertado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-local')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Local Editado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'importar-local')
        <script>
            Swal.fire(
                'Insertado!',
                'Local Insertado.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.eliminar-local').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Está seguro que desea eliminar el Local?",
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
