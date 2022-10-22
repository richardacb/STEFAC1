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
        {{--  @can('Modulo_PerfildeUsuario.usuarios.create')  --}}
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary ">Registrar Usuario</a>
        {{--  @endcan  --}}
    </div>
    <div class="card-body">
        <table id="usuarios_id" class="table table-striped shadow-lg w-100">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nombre y Apellidos</th>
                    <th>Usuario</th>
                    <th>Tipo de usuario</th>
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
                        <td width="150px">
                            @can('Modulo_PerfildeUsuario.usuarios.edit')
                                <a class="btn btn-warning btn-sm " href="{{ route('usuarios.edit', $user->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Asignar Rol"><i
                                        class="fa fa-users-cog"></i></a>
                            @endcan
                            {{--  @can('Modulo_PerfildeUsuario.usuarios.editar')  --}}
                            <a class="btn btn-primary btn-sm" href="{{ route('usuarios.editar', $user->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Editar Usuario"><i
                                    class="fa fa-edit"></i></a>
                            {{--  @endcan  --}}
                            {{--  @can('Modulo_PerfildeUsuario.usuarios.editar')  --}}
                            <a class="btn btn-success btn-sm" href="{{ route('usuarios.show', $user->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Mostrar Datos"><i
                                    class="fa fa-user"></i></a>
                            {{--  @endcan  --}}
                            <a class="btn btn-danger btn-sm" href="{{ route('change-password') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Cambiar Contraseña"><i
                                    class="fa fa-lock"></i></a>
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
        $('#usuarios_id').DataTable({
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ Registros por Página",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "first": "Primero",
                    "last": "Último",
                }
            }
        });
    });
</script>
@endsection
