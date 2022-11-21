@extends('adminlte::page')

@section('template_title')
{{ $comision_disciplinaria->name ?? 'Comision_Disciplinaria'}} 

@endsection
<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">

@section('content')
<section class="content container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<div class="float-left">
<span class="card-title">Comisión Disciplinaria : <td> 

 {{ $comision_disciplinaria->Nombre_comision}}
   </td></span><br>


</div>
<div class="float-right">
<a class="byn btn-primary btn-sm" href="{{ route('Comision_disciplinaria.index')}}"> Atrás</a>
</div>
</div>

<div class="card-body">
<div class="mb-3">

        
        <td scope="row">
      
        <label for="" class="form-label">Presidente:</label>                   
        <td> 
 {{ $comision_disciplinaria->Presidente }}
                                </td><br><br>
        <label for="" class="form-label">Secretario:</label>   

                                <td> 
 {{ $comision_disciplinaria->Miembro }}
                                </td><br><br>
                                <label for="" class="form-label">Miembro:</label>   
                                <td> 
 {{ $comision_disciplinaria->miemb }}
                                </td><br><br>
                               
                               
                                
               
                                
                                <label for="" class="form-label">Fecha:</label> 

   <td> 
 {{ $comision_disciplinaria->created_at }}
   </td>

     

 </div>

 
        </div>

</div>
</div>
</div>
</div>





<div class="card">
    <div class="card-body">
    <td width="5px">
<span class="card-title">Denuncias </span>
  
  
        <table class="table table-striped">
            <thead>
                <tr>

                    <th>Denuncia #</th>
                    <th>Nombre_denunciante</th>
                    <th>Descripcion</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                  @foreach ($denuncia as $de)
            <tr>
           <td>
            
                          
            @if ($comision_disciplinaria->id === $de->id_comision)
                   
                    {{ $de->id }}
                   
                    @endif 
           
            </td>
            <td>
            
                          
                                @if ($comision_disciplinaria->id === $de->id_comision)
                                       
                                        {{ $de->Nombre_denunciante }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                                @if ($comision_disciplinaria->id === $de->id_comision)
                                       
                                       {{ $de->descripcion }}
                                      
                                       @endif 
                               
                                </td>
                                <td>
            
                          
                                @if ($comision_disciplinaria->id === $de->id_comision)
                                       
                                       {{ $de->created_at }}
                                      
                                       @endif 
                               
                                </td>
                               
                                       
                                        
                               
                                @endforeach
                </tbody>
                </table>
</div>
</div>

            
</div>
</div>
</section>
@endsection