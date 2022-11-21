@extends('adminlte::page')

@section('title', 'Comisiones Disciplinarias')

@section('content_header')
    <h1>Listado de Comisiones</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection

<div class="card">
    <div class="card-header">

<a class="btn btn-primary btn-lg"  class="float-rigth"   href="{{ route('descargar-pdf') }}" ><i class="bi bi-filetype-pdf"></i></a>


@can('Modulo_ComisionDisciplinaria.Comision_disciplinaria.create')
<a class="btn btn-success btn-sm float-right" href="{{ route('Comision_disciplinaria.create') }}">Crear Comisión Disciplinaria</a>
@endcan                
</div>








<div class="card-body">
<table id="comision_id" class="table table-striped shadow-lg w-100">
                            <thead class="bg-primary text-white">
                <tr>

                    <th class=text-center>Comisión</th>
                    <th class=text-center>Presidente</th>
                    <th class=text-center> Secretario</th>
                    <th class=text-center> Miembro</th>
                    <th class=text-center>Fecha de Creación</th>
                <th>Mostrar</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
           
         @foreach ($comision_disciplinaria as $comision_disciplinaria )
                <tr>
                    <td>{{ $comision_disciplinaria-> Nombre_comision}}</td>
                    <td>{{ $comision_disciplinaria-> Presidente }}</td>
                    <td>{{ $comision_disciplinaria-> Miembro}}</td>
                    <td>{{ $comision_disciplinaria-> miemb}}</td>
                    <td>{{ $comision_disciplinaria-> created_at }}</td>

                    <td width="5px">
                    <a class="btn btn-success" href="{{ route('Comision_disciplinaria.show', $comision_disciplinaria->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Mostrar comisión"><i class="fa fa-eye"></i></a>
                    </td>     
                    @can('Modulo_ComisionDisciplinaria.Comision_disciplinaria.edit')
                    <td width="10px">
                    <a  href="{{ route('Comision_disciplinaria.edit', $comision_disciplinaria->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Editar Comisión" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    </td>
                    @endcan
                    @can('Modulo_ComisionDisciplinaria.Comision_disciplinaria.destroy')
                    <form action="{{ route('Comision_disciplinaria.destroy', $comision_disciplinaria->id) }}" method="POST"
                                                class="eliminar-comision">
                                                @csrf
                                                @method('delete')
                    <td width="10px">
                                                      
                                                    <button class="btn btn-danger" type="submit"><i
                                                    width="18" height="18" class="fa fa-trash"></i></button>
                                                    </td>
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
        $('#comision_id').DataTable({
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
    @if (session('info') == 'eliminar-comision')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Comisión Eliminada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-comision')
        <script>
            Swal.fire(
                '¡Creado!',
                'Comisión Registrada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-comision')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Comisión Editada.',
                'success'
            )
        </script>
    @endif
    
    <script>
        $('.eliminar-comision').submit(function(e) {
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
<script src="{{ asset('js/popper.min.js') }}"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection



