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
        {{-- <a href="{{ route('profesores.export') }}" class="btn btn-danger float-right" role="button">Exportar
            datos de estudiantes</a> --}}

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
                        <td> {{ $profesor->nombre_profesor }} </td>
                        <td> @if ($profesor->anno == '1')
                            Primer Año
                        @endif
                        @if ($profesor->anno == '2')
                            Segundo Año
                        @endif
                        @if ($profesor->anno == '3')
                            Tercer Año
                        @endif
                        @if ($profesor->anno == '4')
                            Cuarto Año
                        @endif
                        @if ($profesor->anno == '5')
                            Quinto Año
                        @endif</td>
                        <td>{{ $profesor->grupo }}</td>

                        <td width="140px">
                            <form action="{{ route('profesores.destroy', $profesor->p_id) }}" method="POST"
                                class="eliminar_datos_profesores">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger float-right btn-sm mr-2" type="submit"
                                    ><i class="fa fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Eliminar datos de profesor"></i></button>

                                 {{-- @can('Modulo_PerfildeUsuario.profesores.edit') --}}
                                    <a class="btn btn-primary btn-sm float-right mr-2"
                                        href="{{ route('profesores.edit', $profesor->p_id) }}"><i class="fa fa-edit"
                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                            title="Editar Profesor"></i></a>
                                 {{-- @endcan --}}
                                <a class="btn btn-success btn-sm float-right mx-2"
                                    href="{{ route('usuarios.show', $profesor->id) }}" ><i
                                        class="fa fa-user" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Mostrar Datos del Profesor"></i></a>
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
@if (session('info') == 'eliminar-datos-profesores')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'Los datos del profesor se eliminaron con exito.',
            'success'
        )
    </script>
@endif
<script>
    $('.eliminar_datos_profesores').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los datos del profesor se eliminaran definitivamente",
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
