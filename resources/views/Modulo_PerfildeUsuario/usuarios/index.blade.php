@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Lista de usuario</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection
<div class="card">
    <div class="card-header">
        @can('Modulo_PerfildeUsuario.usuarios.create')
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary ">Registrar Usuario</a>
        @endcan
        @can('Import.UsuariosImport')
         <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                data-target=".bd-example-modal-lg">Importar datos de usuarios</button>
        @endcan
         {{-- <a href="{{ route('usuarios.pdf') }}" class="btn btn-primary ">Convertir a PDF</a> --}}
          
    </div>
     
    
    
    <div class="card-body">
        <table id="usuarios_id" class="table table-striped shadow-lg w-100">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nombre y Apellidos</th>
                    <th>Usuario</th>
                    <th>Tipo de usuario</th>
                    <th>Año</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->primer_nombre }} {{ $user->segundo_nombre }} {{ $user->primer_apellido }}
                            {{ $user->segundo_apellido }}</td>
                        <th>{{ $user->username }}</th>
                        <th>{{ $user->tipo_de_usuario }}</th>
                        <th>
                            @if ( $user->anno == '1')
                            Primer Año
                        @endif
                        @if ( $user->anno == '2')
                            Segundo Año
                        @endif
                        @if ( $user->anno == '3')
                            Tercer Año
                        @endif
                        @if ( $user->anno == '4')
                            Cuarto Año
                        @endif
                        @if ( $user->anno == '5')
                            Quinto Año
                        @endif
                        </th>
                        <td width="150px">
                            @can('Modulo_PerfildeUsuario.usuarios.edit')
                                <a class="btn btn-warning btn-sm " href="{{ route('usuarios.edit', $user->id) }}"
                                    data-bs-toggle="tooltip" data-bs-placement="right" title="Asignar Rol"><i
                                        class="fa fa-users-cog"></i></a>
                            @endcan
                            @can('Modulo_PerfildeUsuario.usuarios.editar')
                            <a class="btn btn-primary btn-sm" href="{{ route('usuarios.editar', $user->id) }}"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Editar Usuario"><i
                                    class="fa fa-edit"></i></a>
                            @endcan
                            @can('Modulo_PerfildeUsuario.usuarios.show')
                            <a class="btn btn-success btn-sm" href="{{ route('usuarios.show', $user->id) }}"
                                data-bs-toggle="tooltip" data-bs-placement="right" title="Mostrar Datos"><i
                                    class="fa fa-user"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Importar datos de usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('usuarios.import') }}" method="POST"
                     enctype="multipart/form-data">
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
<!--Fin Modal -->
@stop

@section('js')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#usuarios_id').DataTable({
            "language": {
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
@if (session('info') == 'importar-usuarios')
    <script>
        Swal.fire(
            '¡Importado!',
            'Los Usuarios se importaron con exito.',
            'success'
        )
    </script>
@endif
@if (session('info') == 'asignar-rol-usuario')
<script>
Swal.fire(
      '¡Asigando!',
      'Se asigno el Rol con exito.',
      'success'
    )
</script>
@endif
<script src="{{ asset('js/popper.min.js') }}"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection
