@extends('adminlte::page')

@section('title', 'Evidencias')

@section('content_header')
<h1>Listado de Evidencias</h1>
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


        
<div><a class="btn btn-success btn-sm float-right" href="{{ route('Evidencia.create') }}">Crear Evidencia</a></div>




                    
                   




    


<div class="card-body">
<table id="ev" class="table table-striped shadow-lg w-100">
                            <thead class="bg-primary text-white">
                <tr>
                    
                    <th>Evidencia</th>
                    <th>Imagen</th>
                    <th>Video</th>
                    <th>Expediente </th>
                    <th>Fecha de Creación</th>
                   
                    <th> Mostrar </th>
                   
                    <th> Eliminar </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($evidencia as $evidencia)
           
         
                        <tr> 
                       

                                
<td>


    
{{ $evidencia->id }}
   


</td>

<td class="border px-14 py-1">
  <img src="{{asset('storage').'/'.$evidencia->Imagen }}" width="100" height="80" >
  </td>
  <td class="border px-14 py-1">
  <video src="{{asset('storage').'/'.$evidencia->Video }}" controls width="100" height="80" autoplay muted loop></video>
</td>
   



                               <td scope="row">
                           @foreach ($expediente as $na)
                               @if ($evidencia->id_expediente === $na->id)
                               
                                 Expediente: {{ $na->id }} Denuncia: {{ $na->id_denuncia }}
                               @endif
                               
                           @endforeach

                       </td>


   

  <td>
    
    {{ $evidencia->created_at }}

    </td>

     <td width="5px">
                    <a class="btn btn-success" href="{{ route('Evidencia.show', $evidencia->id) }}"><i class="bi bi-eye"></i></a>
                    </td>

                   
                    
                    <form action="{{ route('Evidencia.destroy', $evidencia->id) }}" method="POST"
                                                class="eliminar-evidencia">
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
            $('#ev').DataTable({
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
    @if (session('info') == 'eliminar-evidencia')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Evidencia Eliminada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-evidencia')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Evidencia Registrado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-evidencia')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Evidencia Editado.',
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

