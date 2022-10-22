@extends('adminlte::page')

@section('title', 'Balance de Carga')

@section('content_header')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 py-2">
                <div class="row">
                    <div class="col-md-9 py-2">
                        <h1>Visualizar Balance de Carga</h1>
                    </div>
                    <div class="col-md-3 py-2 ">
                        @can('Exports.BalancedecargaExport')
                            <a href="{{ route('balancedecarga.export') }}" class="btn btn-primary btn-sm" role="button">Exportar
                                Balance de Carga</a>
                        @endcan
                        @can('Modulo_Horario.balancedecarga.create')
                            <a class="btn btn-primary btn-sm" href="{{ route('balancedecarga.create') }}" role="button">Insertar
                                Datos</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
@endsection
@section('content')


    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg pt-4" id="balance">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Asignaturas</th>
                        <th scope="col">Semanas</th>
                        <th scope="col">Frecuencias</th>
                        <th scope="col">Tipo de Clases</th>
                        <th scope="col">Insertado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($balancedecarga as $bc)
                        <tr>
                            <td scope="row">
                                @foreach ($nombreasignaturas as $na)
                                    @if ($bc->asignaturas_id === $na->id)
                                        {{ $na->nombre }}
                                    @endif
                                @endforeach

                            </td>
                            <td>
                                @foreach ($nombreasignaturas as $na)
                                    @if ($bc->asignaturas_id === $na->id)
                                        {{ $bc->semana }}
                                    @endif
                                @endforeach

                            </td>
                            <td>

                                @foreach ($nombreasignaturas as $na)
                                    @if ($na->id === $bc->asignaturas_id)
                                        {{ $bc->frecuencia }}
                                    @endif
                                @endforeach

                            </td>
                            <td>

                                @foreach ($nombreasignaturas as $na)
                                    @if ($na->id === $bc->asignaturas_id)
                                        {{ $bc->tipo_clase }}
                                    @endif
                                @endforeach

                            </td>
                            <td>
                                {{ $bc->created_at }}
                            </td>
                            <td width="150px">
                                <form action="{{ route('balancedecarga.destroy', $bc) }}" method="POST"
                                    class="eliminar-balancedecarga">
                                    @csrf
                                    @method('delete')
                                    @can('Modulo_Horario.balancedecarga.edit')
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('balancedecarga.edit', $bc) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Editar Balance de Carga"><i
                                            class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('Modulo_Horario.balancedecarga.destroy')
                                        <button class="btn btn-danger btn-sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="right" title="Eliminar Balance de Carga"><i
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




@stop

@section('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#balance').DataTable({
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
    @if (session('info') == 'eliminar-balancedecarga')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Datos eliminados.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-balancedecarga')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Datos Registrados.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-balancedecarga')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Balance de Carga Editado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'importar-afectacion')
        <script>
            Swal.fire(
                'Insertad0!',
                'Datos Registrados.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.eliminar-balancedecarga').submit(function(e) {
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
@stop
