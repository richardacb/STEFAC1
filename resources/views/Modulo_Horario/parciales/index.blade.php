@extends('adminlte::page')
@section('title', 'Pruebas Parciales')

@section('content_header')

    <div class="container-fluid">
        <h1>Listado de Pruebas Parciales</h1>
        <div class="row">
            <div class="col-xl-12">
                @can('Modulo_Horario.asignaturas.create')
                    <a class="btn btn-primary btn-sm float-right" href="{{ route('parciales.create') }}">Insertar Prueba
                        Parcial</a>
                @endcan
            </div>
            <div class="mt-3" id="respuesta">

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <?php
    if (isset($_GET['msg'])) {
        echo "
             <div class=\"alert alert-info alert-dismissible fade show w-50\" role=\"alert\">
                 <strong>" .
            $_GET['msg'] .
            "</strong>
            <button type=\"button\" class=\"close btn btn-info\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span> X</span>
            </button>
            </div>";
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped shadow-lg pt-4" id="asig">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Año Docente</th>
                                    <th>Semestre</th>
                                    <th>Semana</th>
                                    <th>Día</th>
                                    <th>Turno</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parciales as $p)
                                    <tr>
                                        <td scope="row">{{ $p->nombre }}</td>
                                        <td>{{ $p->anno }}</td>
                                        <td>{{ $p->semestre }}</td>
                                        <td>{{ $p->semana }}</td>
                                        <td>{{ $p->dia }}</td>
                                        <td>{{ $p->turno }}</td>
                                        <td width="150px">
                                            <form action="{{ route('parciales.destroy', $p->id) }}" method="POST"
                                                class="eliminar-parciales">
                                                @csrf
                                                @method('delete')
                                                {{--  @can('Modulo_Horario.asignaturas.edit')  --}}
                                                {{--  <a class="btn btn-primary btn-sm" href="{{ route('parciales.edit', $p->id) }}" data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="Editar Prueba Parcial"><i
                                                    class="fa fa-edit"></i></a>  --}}
                                                {{--  @endcan
                                                @can('Modulo_Horario.asignaturas.destroy')  --}}
                                                <button class="btn btn-danger btn-sm" type="submit"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    title="Eliminar Prueba Parcial"><i class="fa fa-trash-alt"></i></button>
                                                {{--  @endcan  --}}
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
    @if (session('info') == 'eliminar-parciales')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Prueba Parcial Eliminada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-parciales')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Prueba Parcial Registrada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'mostrar-generado')
        <script>
            Swal.fire(
                'Error!',
                'No se puede planificar Prueba Parcial, el Horario ya está generado, por favor primero inserte las pruebas parciales y luego genere el Horario de la semana correspondiente',
                'warning'
            )
        </script>
    @endif

    @if (session('info') == 'modificar-parciales')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Prueba Parcial Editada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'importar-parciales')
        <script>
            Swal.fire(
                'Insertada!',
                'Prueba Parcial Registrada.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.eliminar-parciales').submit(function(e) {
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
