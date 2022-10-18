@extends('adminlte::page')

@section('title', 'Asignaturas')

@section('content_header')

    <div class="container-fluid">
        <h1>Listado de Asignaturas</h1>
        <div class="row">
            <div class="col-xl-12">
                @can('Modulo_Horario.asignaturas.create')
                    <a class="btn btn-primary btn-sm float-right" href="{{ route('asignaturas.create') }}">Insertar
                        Asignatura</a>
                @endcan
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped shadow-lg pt-4" id="asig">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Año Docente</th>
                                    <th>Sesión de Clases</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asignaturas as $asignatura)
                                    <tr>
                                        <td>{{ $asignatura->nombre }}</td>
                                        <td>{{ $asignatura->anno }}</td>
                                        @foreach ($secciones as $s)
                                            @if ($asignatura->secciones_id === $s->id)
                                                <td>{{ $s->nombre }}</td>
                                            @endif
                                        @endforeach
                                        <td width="150px">
                                            <form action="{{ route('asignaturas.destroy', $asignatura) }}" method="POST"
                                                class="eliminar-asignatura">
                                                @csrf
                                                @method('delete')
                                                @can('Modulo_Horario.asignaturas.edit')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('asignaturas.edit', $asignatura->id) }}"><i
                                                        class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Modulo_Horario.asignaturas.destroy')
                                                    <button class="btn btn-danger btn-sm" type="submit"><i
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
            $('#asig').DataTable({
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
    @if (session('info') == 'eliminar-asignatura')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Asigantura Eliminada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-asignatura')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Asignatura Registrada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-asignatura')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Asignatura Editada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'importar-asignatura')
        <script>
            Swal.fire(
                'Insertada!',
                'Asignatura Registrada.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.eliminar-asignatura').submit(function(e) {
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
@endsection
