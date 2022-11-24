@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <h1>Listado de optativas</h1>
        <div class="row">
            <div class="col-xl-12">
                @can('Modulo_Optativas.optativa.create')
                    <a href="optativa/create" class="btn btn-primary btn-sm float-right">Agregar Optativa</a>
                @endcan
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <table class="table table-striped shadow-lg pt-4" id="opt">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Optativa</th>
                <th scope="col">Descripción</th>
                <th scope="col">Profesores</th>
                <th scope="col">Capacidad</th>
                <th scope="col">Año académico</th>
                <th scope="col">Semestre</th>
                <th scope="col">Estado</th>
                <th scope="col">acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($optativas as $optativa)
                <tr>
                    <td>{{ $optativa->nombre }}</td>
                    <td>{{ $optativa->descripcion }}</td>
                    <td>
                        @if ($optativa->prof_principal && $optativa->prof_auxiliar)
                            {{ $optativa->prof_principal }}
                            <br>
                            {{ $optativa->prof_auxiliar }}
                        @endif
                        @if (!$optativa->prof_principal || !$optativa->prof_auxiliar)
                            {{ $optativa->prof_principal }} {{ $optativa->prof_auxiliar }}
                        @endif
                    </td>
                    <td>{{ $optativa->capacidad }}</td>
                    <td>{{ $optativa->anno_academico }}</td>
                    <td>{{ $optativa->semestre }}</td>
                    <td>{{ $optativa->estado }}</td>

                    <td>
                        <form action="{{ route('optativa.destroy', $optativa->id) }}" method="POST"
                            class="eliminar-optativa">
                            @can('Modulo_Optativas.optativa.show')
                                <a href="{{ route('optativa.show', $optativa->id) }}" class="btn btn-warning"
                                    data-bs-toggle="tooltip" data-bs-placement="right" title="Mostrar Datos"><i
                                        class="fa fa-user"></i></a>
                            @endcan
                            @can('Modulo_Optativas.optativa.edit')
                                <a href="{{ route('optativa.edit', $optativa->id) }}" class="btn btn-primary"
                                    data-bs-toggle="tooltip" data-bs-placement="right" title="Editar Asignatura Optativa"><i
                                        class="fa fa-edit"></i></a>
                            @endcan
                            @csrf
                            @method('DELETE')
                            @can('Modulo_Optativas.optativa.destroy')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Eliminar Optativa"></i></button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
@section('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#opt').DataTable({
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
    @if (session('info') == 'eliminar-optativa')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Datos eliminados.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-optativa')
        <script>
            Swal.fire(
                '¡Insertada!',
                'Optativa Insertada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-optativa')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Optativa Editada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'importar-optativa')
        <script>
            Swal.fire(
                'Insertada!',
                'Optativa Insertada con Éxito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.eliminar-optativa').submit(function(e) {
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
