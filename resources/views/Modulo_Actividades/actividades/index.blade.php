@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Listado de Actividades</h1>
@stop

@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@stop

<div class="card">
     <div class="card-header">
        <a href="{{ route('actividades.create') }}" class="btn btn-primary ">Insertar actividad</a>

        <th class="d-flex">
            <button type="button" class="btn btn-warning float-right " data-toggle="modal"
            data-target=".grafica_act"><i class="fa fa-chart-pie">&nbsp;</i><strong>Actividades</strong></button>
            </th>

     </div>
</div>

<div class="card-body">
    <table id="actividades_id" class="table table-striped shadow-lg w-100">
        <thead class="bg-primary text-white">
            <tr>

                <th>Nombre</th>
                <th>Tipo de Actividad</th>
                <th>Año</th>

                <th width="160px">Acción</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($actividades as $actividad)
                <tr>

                    <td>{{$actividad->nombre }}</td>
                    <td>{{$actividad->tipo_actividad}}</td>
                    <td>{{$actividad->año}}</td>
                    <td>
                        <form action="{{ route('actividades.destroy', $actividad) }}" method="POST"
                            class="eliminar-actividad">
                            @csrf
                            @method('delete')
                                <a class="btn btn-primary btn-sm" href="{{ route('actividades.edit', $actividad->id) }}"><i
                                        class="fa fa-edit">&nbsp;</i>Editar</a>

                                <button class="btn btn-danger btn-sm " type="submit"><i
                                        class="fa fa-trash-alt">&nbsp;</i>Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
    @include('Modulo_Actividades.actividades.modal')</p>
@stop



@section('js')
<script src="{{ asset('js/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#actividades_id').DataTable({


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

@if (session('info') == 'adicionar-actividad')
    <script>
        Swal.fire(
            '¡Insertado!',
            'La actividad se inserto con exito.',
            'success'
        )
    </script>
@endif
@if (session('info') == 'modificar-actividad')
    <script>
        Swal.fire(
            '¡Modificado!',
            'La actividad se modifico con exito.',
            'success'
        )
    </script>
@endif

<script>
    $('.eliminar-actividad').submit(function(e) {
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
