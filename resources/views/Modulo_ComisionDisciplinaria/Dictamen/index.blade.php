@extends('adminlte::page')

@section('title', 'Dictámenes')

@section('content_header')
<h1>Listado de Dictámenes</h1>
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
<a class="btn btn-primary btn-lg"  class="float-rigth"   href="{{ route('descargardic-pdf') }}" ><i class="bi bi-filetype-pdf"></i></a>

        
<div><a class="btn btn-success btn-sm float-right" href="{{ route('Dictamen.create') }}">Crear Dictámen</a></div>




                    
                   




    


<div class="card-body">
<table id="di" class="table table-striped shadow-lg w-100">
                            <thead class="bg-primary text-white">
                <tr>
                    
                    <th>Dictámen</th>
                    <th>Expediente </th>
                    <th>Tipo de falta Cometida</th>
                    <th>Medida Disciplinaria Impuesta</th>
                    <th>Fecha de Creación</th>
                    	
                    <th> Mostrar </th>
                    <th> Editar </th>
                    <th> Eliminar </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($dictamen as $dictamen)
           
         
                        <tr> 
                        <td>
                               
                                    {{ $dictamen->id }}
                                    
                                    </td>
                                    <td scope="row">
                                @foreach ($expediente as $na)
                                    @if ($dictamen->id_expediente === $na->id)
                                    
                                      Expediente:  {{ $na->id }} Denuncia: {{ $na->id_denuncia }}
                                    @endif
                                    
                                @endforeach

                            </td>

                                
<td>


    
{{ $dictamen->tipofalta }}
   


</td>

<td>


    
{{ $dictamen->medida }}
   


</td>
   





   

                            <td>
    
    {{ $dictamen->created_at }}

   

    </td> <td width="5px">
                    <a class="btn btn-success" href="{{ route('Dictamen.show', $dictamen->id) }}"><i class="bi bi-eye"></i></a>
                    </td>

                    <td width="10px">
                    <a  href="{{ route('Dictamen.edit', $dictamen->id) }}" data-bs-toggle="tooltip" data-bs-placement="right"  class="btn btn-primary"><i class="fa fa-edit"></i></a>
</td>
                    
                    <form action="{{ route('Dictamen.destroy', $dictamen->id) }}" method="POST"
                                                class="eliminar-dictamen">
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
            $('#di').DataTable({
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
    @if (session('info') == 'eliminar-dictamen')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Dictamen Eliminado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-dictamen')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Dictamen Registrado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-declaracion')
        <script>
            Swal.fire(
                '¡Modificado!',
                'dictamen Editado.',
                'success'
            )
        </script>
    @endif
    
    <script>
        $('.eliminar-dictamen').submit(function(e) {
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

