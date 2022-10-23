@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Lista de Grupos</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

<div class="card">
    <div class="card-header">
        @can('Modulo_PerfildeUsuario.grupos.create')
            <a href="{{ route('grupos.create') }}" class="btn btn-primary ">Insertar grupo</a>
        @endcan

        {{-- @can('Import.GruposImport')
            <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                data-target=".bd-example-modal-lg">Importar grupos</button>
        @endcan --}}

    </div>
    <div class="card-body">
        <table id="grupos_id" class="table table-striped shadow-lg w-100">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nombre</th>
                    <th>Año</th>
                    <th width="160px">Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->name }}</td>
                        <td>{{ $grupo->anno }}</td>
                        <td>
                            <form action="{{ route('grupos.destroy', $grupo) }}" method="POST" class="eliminar_grupo">
                                @csrf
                                @method('delete')
                                @can('Modulo_PerfildeUsuario.grupos.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('grupos.edit', $grupo->id) }}"
                                        data-bs-toggle="tooltip" data-bs-placement="right" title="Editar Grupo"><i
                                            class="fa fa-edit"></i></a>
                                @endcan

                                @can('Modulo_PerfildeUsuario.grupos.destroy')
                                    <button class="btn btn-danger btn-sm " type="submit" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Eliminar Grupo"><i
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
{{-- <!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Importar Grupos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grupos.import') }}" method="POST" enctype="multipart/form-data">
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
        $('#grupos_id').DataTable({
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
@if (session('info') == 'eliminar-grupo')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'El grupo se elimino con exito.',
            'success'
        )
    </script>
@endif
@if (session('info') == 'adicionar-grupo')
    <script>
        Swal.fire(
            '¡Insertado!',
            'El grupo se inserto con exito.',
            'success'
        )
    </script>
@endif
@if (session('info') == 'modificar-grupo')
    <script>
        Swal.fire(
            '¡Modificado!',
            'El grupo se modifico con exito.',
            'success'
        )
    </script>
@endif
@if (session('info') == 'importar-grupo')
    <script>
        Swal.fire(
            '¡Importado!',
            'Los grupos se importaron con exito.',
            'success'
        )
    </script>
@endif
<script>
    $('.eliminar_grupo').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Este grupo se eliminara definitivamente",
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
