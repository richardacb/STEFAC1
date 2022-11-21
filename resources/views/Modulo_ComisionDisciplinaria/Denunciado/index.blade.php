@extends('adminlte::page')

@section('title', 'Denunciados')

@section('content_header')
<h1>Listado de Denunciados</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection

<div class="card">

    <div class="card-header">
    <a class="byn btn-primary btn-sm" href="{{ route('Denuncia.index')}}"> Atrás</a>   
  
<a class="btn btn-primary btn-lg"  class="float-rigth"   href="{{ route('descargard-pdf') }}" ><i class="bi bi-filetype-pdf"></i></a>


<a class="btn btn-success btn-sm float-right" href="{{ route('Denunciado.create') }}">Crear Denunciado</a>

                     








<div class="card-body">
<table id="denunciado_id" class="table table-striped shadow-lg w-100">
                            <thead class="bg-primary text-white">
                <tr>
                   <th >Denunciado</th>
                    <th >Nombre y Apellidos del Denunciado</th>
                    <th >Denuncia</th>
                
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($denunciado as $denunciado)
            <tr>
            <td>
              {{ $denunciado->id }}
                                       
                               
                                </td>

                                <td>
            
                          
                                {{ $denunciado->Nombre_denunciado }}                 
        
           
   
    </td>
    
    <td scope="row">
                                @foreach ($denuncia as $na)
                                @if ($denunciado->id_denuncia === $na->id)
                                Denuncia: {{ $na->id }} Denunciante: {{ $na-> Nombre_denunciante }}
                                        @endif 
                                @endforeach

                            </td>

                  
                            <td width="10px">
                    <a  href="{{ route('Denunciado.edit', $denunciado->id) }}" data-bs-toggle="tooltip" data-bs-placement="right"  class="btn btn-primary"><i class="fa fa-edit"></i></a>
</td>
                    
                   
<form action="{{ route('Denunciado.destroy', $denunciado->id) }}" method="POST"
                                                class="eliminar-denunciado">
                                                @csrf
                                                @method('delete')
                    <td width="10px">
                                                      
                                                    <button class="btn btn-danger" type="submit"><i
                                                    width="18" height="18"  class="bi bi-trash3"></i></button>
                                                    </td>
                                                   
                                            </form>
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
            $('#denunciado_id').DataTable({
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
    @if (session('info') == 'eliminar-denunciado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Denunciado Eliminado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-denunciado')
        <script>
            Swal.fire(
                '¡Insertado!',
                'Denunciado Registrado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-denunciado')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Denunciado Editado.',
                'success'
            )
        </script>
    @endif
    
    <script>
        $('.eliminar-denunciado').submit(function(e) {
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
