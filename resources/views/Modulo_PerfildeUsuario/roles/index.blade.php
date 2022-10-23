@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

<div class="card">
    <div class="card-header">

        <a href="{{ route('roles.create') }}" class="btn btn-primary ">Insertar role</a>


    </div>
    <div class="card-body">
        <table id="roles_id" class="table table-striped shadow-lg w-100">
            <thead class="bg-primary text-white">
                <tr>

                    <th>ID</th>
                    <th>Role</th>
                    <th width="160px">Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="eliminar_role">
                                @csrf
                                @method('delete')

                                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}"
                                    data-bs-toggle="tooltip" data-bs-placement="right" title="Editar Rol"><i
                                        class="fa fa-edit"></i></a>



                                <button class="btn btn-danger btn-sm " type="submit" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Eliminar Rol"><i
                                        class="fa fa-trash-alt"></i></button>


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
        $('#roles_id').DataTable({
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
@if (session('info') == 'eliminar-role')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'El role se elimino con exito.',
            'success'
        )
    </script>
@endif
@if (session('info') == 'adicionar-role')
    <script>
        Swal.fire(
            '¡Insertado!',
            'El role se inserto con exito.',
            'success'
        )
    </script>
@endif
@if (session('info') == 'modificar-role')
    <script>
        Swal.fire(
            '¡Modificado!',
            'El role se modifico con exito.',
            'success'
        )
    </script>
@endif
<script>
    $('.eliminar_role').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Este role se eliminara definitivamente",
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
