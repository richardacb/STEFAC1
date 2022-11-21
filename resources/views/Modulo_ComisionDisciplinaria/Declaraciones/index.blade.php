@extends('adminlte::page')

@section('title', 'Declaraciones')

@section('content_header')
<h1>Listado de Declaraciones</h1>

@stop
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<div class="card">

    <div class="card-header">

          
    <a class="byn btn-primary btn-sm" href="{{ route('Expediente.index')}}"> Atrás</a>
<a class="btn btn-primary btn-lg"  class="float-rigth"   href="{{ route('descargardc-pdf') }}" ><i class="bi bi-filetype-pdf"></i></a>

<a class="btn btn-success btn-sm float-right" href="{{ route('Declaraciones.create') }}">Crear Declaración</a>
                     








<div class="card-body">
<table id="dec" class="table table-striped shadow-lg w-100">
                            <thead class="bg-primary text-white">
                <tr>


                    <th class=text-center>Declaración</th>
                    <th class=text-center>Nombre y Apellidos del declarante </th>
                    <th class=text-center>Responsabilidad o cargo</th>
                    <th class=text-center>Fecha de Creación</th>
                    <th class=text-center>Expediente</th>
                 
                    <th> Mostrar </th>
                    <th> Editar </th>
                    <th> Eliminar </th>
                 
                </tr>
            </thead>
            <tbody>
            @foreach ($declaraciones as $declaraciones)
           
         
                        <tr> 
                        <td>
                               
                                    {{ $declaraciones->id }}
                                    
                                    </td>

                                    <td>


    
    {{ $declaraciones->Nombre_declarante }}
   


</td>
<td>


    
{{ $declaraciones->cargo }}
   


</td>


   




<td>
    
    {{ $declaraciones->created_at }}

   

    </td>
    <td scope="row">
                                @foreach ($expediente as $na)
                                    @if ($declaraciones->id_expediente === $na->id)
                                    
                                        Expediente: {{ $na->id }} Denuncia: {{ $na->id_denuncia }}
                                    @endif
                                    
                                @endforeach

                            </td>
                            <td width="5px">
                    <a class="btn btn-success" href="{{ route('Declaraciones.show', $declaraciones->id) }}"><i class="bi bi-eye"></i></a>
                    </td>

                    <td width="10px">
                    <a  href="{{ route('Declaraciones.edit', $declaraciones->id) }}" data-bs-toggle="tooltip" data-bs-placement="right"  class="btn btn-primary"><i class="fa fa-edit"></i></a>
</td>
                    
                    <form action="{{ route('Declaraciones.destroy', $declaraciones->id) }}" method="POST"
                                                class="eliminar-declaraciones">
                                                @csrf
                                                @method('delete')
                    <td width="10px">
                                                      
                                                    <button class="btn btn-danger" type="submit"><i
                                                    width="18" height="18"  class="bi bi-trash3"></i></button>
                                                    </td>
                                                   
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
            $('#dec').DataTable({
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
    @if (session('info') == 'eliminar-declaracion')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Declaración Eliminada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-declaracion')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Declaración Registrada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-declaracion')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Declaración Editada.',
                'success'
            )
        </script>
    @endif
    
    <script>
        $('.eliminar-declaraciones').submit(function(e) {
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

