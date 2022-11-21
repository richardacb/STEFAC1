@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content_header')
<h1>Listado de Expedientes</h1>

@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection

<div class="card">

    <div class="card-header">

          
<a class="btn btn-primary btn-lg"  class="float-rigth"   href="{{ route('descargarex-pdf') }}" ><i class="bi bi-filetype-pdf"></i></a>


<a class="btn btn-success btn-sm float-right" href="{{ route('Expediente.create') }}">Crear Expediente</a>
                     
    
<td width="10px">
                    <a class="btn btn-primary btn-sm" href="{{ route('Declaraciones.index') }}">Declaraciones</a>
                    </td>
                    <td width="10px">
                    <a class="btn btn-primary btn-sm" href="{{ route('Opiniones.index') }}">Opiniones</a>
                    </td>
                 
                    <td width="10px">
                    <a class="btn btn-primary btn-sm" href="{{ route('Evidencia.index') }}">Evidencias</a>
                    </td>
                    <td width="10px">
                    <a class="btn btn-primary btn-sm" href="{{ route('Dictamen.index') }}">Dictámen</a>
                    </td><br><br>
                  







<div class="card-body">
<table id="exp" class="table table-striped shadow-lg w-100">
                            <thead class="bg-primary text-white">
                <tr>


                    <th>Expediente</th>
                    <th>Nombre y Apellidos del denunciado:</th>
                    <th>Denuncia en proceso:</th>
                    
                    <th>Fecha de Creación</th>
                    
                    <th> Mostrar </th>
                    <th> Editar </th>
                    <th> Eliminar </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expediente as $expediente)
                        <tr>
                        <td>
                       Expediente # {{ $expediente->id }}
                        </td>

                        <td scope="row">
                                @foreach ($denunciado as $d)
                                    @if ( $expediente->id_denunciado === $d->id)
                                    {{ $d->Nombre_denunciado}}
                                   Denuncia #: {{ $d->id_denuncia}}
                                    @endif
                                @endforeach
                                </td>

                              
                                <td scope="row">
                                @foreach ($denuncia as $de)
                                    @if ( $expediente->id_denuncia === $de->id)
                                    
                                   Denuncia #: {{ $de->id}}
                                    @endif
                                @endforeach
                                </td>

                                   
                               
                                
               
                                
                                
   <td> 
 {{ $expediente->created_at }}
   </td>

   

   <td width="5px">
                    <a class="btn btn-success" href="{{ route('Expediente.show', $expediente->id) }}"><i class="bi bi-eye"></i></a>
                    </td>      
                   
                    <td width="10px">
                    <a  href="{{ route('Expediente.edit', $expediente->id) }}" data-bs-toggle="tooltip" data-bs-placement="right"  class="btn btn-primary"><i class="fa fa-edit"></i></a>
</td>
                    
                   
                    <form action="{{ route('Expediente.destroy', $expediente->id) }}" method="POST"
                                                class="eliminar-expediente">
                                                @csrf
                                                @method('delete')
                    <td width="10px">
                                                      
                                                    <button class="btn btn-danger" type="submit"><i
                                                    width="18" height="18"  class="bi bi-trash3"></i></button>
                                                    </td>
                                                   
                                            </form>
                                           
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
            $('#exp').DataTable({
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
    @if (session('info') == 'eliminar-expediente')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Expediente Eliminado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-expediente')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Expediente Registrado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-expediente')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Expediente Editado.',
                'success'
            )
        </script>
    @endif
    
    <script>
        $('.eliminar-expediente').submit(function(e) {
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

