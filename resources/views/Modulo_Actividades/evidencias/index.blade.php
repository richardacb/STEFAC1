@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Listado de Evidencias</h1>
@stop

@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@stop

<div class="card">
     <div class="card-header">
        <a href="{{ route('evidencias.create') }}" class="btn btn-primary ">Insertar Evidencia</a>

        <button type="button" class="btn btn-warning float-right " data-toggle="modal"
        data-target=".grafica_evidencia"><i class="fa fa-chart-pie">&nbsp;</i><strong>Reporte</strong></button>

     </div>
</div>

<div class="card-body">

    <table id="evidencia_id" class="table table-striped shadow-lg w-100">
        <thead class="bg-primary text-white">
            <tr>

                <th>Descripción</th>
                <th>Actividad</th>
                <th>Año</th>
                <th>Imagen</th>
                <th style="text-align:center">Acción</th>
            </tr>
        </thead>

        <tbody>


            @foreach ($evidencias as $evidencia )
            @foreach ($actividades as $actividad)
             @if($evidencia->actividades_id == $actividad->id )
             @if ($user[$id] = $evidencia->user_id)
                <tr>
                    <td>{{ $evidencia->descripcion }}</td>
                    <td>{{ $actividad->nombre}}</td>
                    <td>{{ $actividad->año}} </td>
                    <td class="border px-14 py-1">
                        <img src="/imagen/{{ $evidencia->imagen}}" width="60%">
                    </td>
                    <td style="align:center">
                        <form action="{{ route('evidencias.destroy', $evidencia) }}" method="POST"
                            class="eliminar-evidencia">
                            @csrf
                            @method('delete')

                                <button class="btn btn-danger float-right btn-sm mr-2" type="submit"
                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Eliminar Evidencia" ><i
                                    class="fa fa-trash-alt">&nbsp;&nbsp;</i></button>

                                <a class="btn btn-primary btn-sm float-right mr-2" href="{{ route('evidencias.edit', $evidencia->id) }}"><i
                                    class="fa fa-edit"
                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Editar Evidencia" >&nbsp;&nbsp;</i></a>

                                <a class="btn btn-success btn-sm float-right mr-2"
                                    href="{{ route('evidencias.show', $evidencia->id) }}" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Mostrar Datos de la Evidencia" ><i
                                    class="fa fa-user">&nbsp;&nbsp;</i></a>


                        </form>
                    </td>
                </tr>
                @endif
                 @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
    </div>
@include('Modulo_Actividades.evidencias.modal')
@stop



@section('js')
<script src="{{ asset('js/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#evidencia_id').DataTable({

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

@if (session('info') == 'adicionar-evidencia')
    <script>
        Swal.fire(
            '¡Insertado!',
            'La evidencia se inserto con exito.',
            'success'
        )
    </script>
@endif
@if (session('info') == 'modificar-evidencia')
    <script>
        Swal.fire(
            '¡Modificado!',
            'La evidencia se modifico con exito.',
            'success'
        )
    </script>
@endif


<script>
    $('.eliminar-evidencia').submit(function(e) {
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
