@extends('adminlte::page')

@section('title', 'Denuncias')

@section('content_header')
<h1>Listado de Denuncias</h1>
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<div class="card">
    <div class="card-header">

    <a class="btn btn-primary btn-lg"  class="float-rigth"   href="{{ route('mydescarga-pdf') }}" ><i class="bi bi-filetype-pdf"></i></a>



    @can('Modulo_ComisionDisciplinaria.Comision_disciplinaria.create')
    <a class="btn btn-success btn-sm float-right" href="{{ route('Denuncia.create') }}">Crear Denuncia</a>
   <td> <a class="btn btn-success btn-sm float-right" href="{{ route('Denunciado.index') }}">Denunciados</a></td>
    @endcan                
</div>




  
   
   

    


<div class="card-body">
<table id="comision_id" class="table table-striped shadow-lg w-100">
                            <thead class="bg-primary text-white">
                                <tr>
                   <th scope="col"class=text-center>Denuncia</th>
                    <th scope="col"class=text-center>Nombre Denunciante</th>
                    <th scope="col"class=text-center>Comisión</th>
                    <th scope="col"class=text-center>Estado</th>
                    <th scope="col"class=text-center> Fecha de Creación</th>
                    
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($denuncia as $denuncia )
                        <tr>
                        <td>
                               
                                   Denuncia # {{ $denuncia->id }}
                                    
                                    </td>

                                    <td>


    
    {{ $denuncia->Nombre_denunciante }}
   


</td>



<td scope="row">
                                @foreach ($nombrecomision as $na)
                                @if ($denuncia->id_comision === $na->id)
                                        {{ $na->Nombre_comision }}
                                        @endif 
                                @endforeach

                            </td>
                            <td>


    
{{ $denuncia->estado }}




                </td> 
                            
                            <td>


    
    {{ $denuncia->created_at }}
   



                    </td> 
                    
                    <td width="5px">
                    <a class="btn btn-success" href="{{ route('Denuncia.show', $denuncia->id) }}" data-bs-toggle="tooltip" data-bs-placement="right"title="Ver datos"><i class="bi bi-eye"></i></a>
                    </td>
                                           
                                                <td width="10px">
                                               
                                                    <a class="btn btn-primary" 
                                                        href="{{ route('Denuncia.edit', $denuncia->id) }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Modificar denuncia, Asignar comisión, Modificar estado"><i
                                                        class="fa fa-edit" width="18" height="18"></i></a>
                                                        </td>

                                                     
                                                       
                    <form action="{{ route('Denuncia.destroy', $denuncia->id) }}" method="POST"
                                                class="eliminar-denuncia">
                                                @csrf
                                                @method('delete')
                    <td width="10px">
                                                      
                                                    <button class="btn btn-danger" type="submit"><i
                                                    width="18" height="18" class="fa fa-trash"></i></button>
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
    @if (session('info') == 'eliminar-denuncia')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Denuncia Eliminada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-denuncia')
        <script>
            Swal.fire(
                '¡Creado!',
                'Denuncia Registrada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-denuncia')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Denuncia Editada.',
                'success'
            )
        </script>
    @endif
    
    <script>
        $('.eliminar-denuncia').submit(function(e) {
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



