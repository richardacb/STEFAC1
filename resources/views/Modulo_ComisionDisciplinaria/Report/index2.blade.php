@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')


<h1>Listado de Reportes</h1>
                  



@stop

@section('content')
@section('css')
<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">

@endsection


                    
                   




    


<div class="container-fluid">
        
                
<div class="card-body">
<table class="table table-striped shadow-lg pt-4">
        <thead class="bg-primary text-white">
                <tr>

                    <th>Cantidad de Denuncias Registradas</th>
                    <th>Cantidad de Faltas de Tipo Grave </th>
                   
                    <th>Cantidad de denuncias nuevas</th>
                    <th>Cantidad de denuncias en proceso</th>
                    <th>Cantidad de denuncias finalizadas</th>
                    <th>Cantidad de denunciados en el año</th>
                    
                    	
                   
                </tr>
            </thead>
            <tbody>
           
           
         
                        <tr> 
                        <td>
                               
                                    {{ $count_denuncia }}
                                    
                                    </td>
                                    

                                
<td>


    
{{ $count_tipofalta }}
   


</td>


<td>


    
{{ $count_dn }}
   
   


</td>
<td>


    
{{ $count_dp }}
   
   


</td>
<td>


    
{{ $count_df }}
   
   


</td>
   
   
<td>

{{ $count_den }}

</td>


                       
                   
                    
                </tr>
                
              
            </tbody>
        </table>

        
  

    </div>
</div>
@stop
@section('js')

<script src="{{ asset('Modulo_Comisiondisciplinaria/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('Modulo_Comisiondisciplinaria/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Modulo_Comisiondisciplinaria/js/dataTables.bootstrap5.min.js') }}"></script>



          
<script src="{{ asset('Modulo_Comisiondisciplinaria/js/sweetalert2@11.js') }}"></script>



@endsection