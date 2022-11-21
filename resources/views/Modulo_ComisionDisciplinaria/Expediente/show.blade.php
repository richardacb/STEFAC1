@extends('adminlte::page')

@section('template_title')
{{ $expediente->name ?? 'Expediente'}} 

@endsection


@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<div class="float-right">
<a class="byn btn-primary btn-sm" href="{{ route('Expediente.index')}}"> Atrás</a>
</div>
<div class="card-body">
<table class="table table-striped shadow-lg pt-4">
                            <thead class="bg-primary text-white">
                <tr>
                         <th>Expediente: #</th>
                    <th>Nombre y Apellidos del denunciado</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                
            <td> 
 {{ $expediente->id }}
   </td>  
    <td> 
                                @foreach ($denunciado as $d)
                                    @if ( $expediente->id_denunciado === $d->id)
                                    {{ $d->Nombre_denunciado}}<br>
                                
                                    @endif
                                @endforeach
                                </td><br><br>
                              


                                                       
   <td> 
 {{ $expediente->created_at }}
   </td>
  
                </tbody>
                </table>
</div>

<div class="card-body">
                        <table class="table table-striped shadow-lg pt-4" id="denuncia" >
                            <thead class="bg-primary text-white">
                <tr>
                
<th>Denuncia: #</th>
                  
                    <th>Comision</th>
                  
                    <th>Denunciante</th>
                    <th>Estado</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
          
            <tr>
            <td> 
           
            @foreach ($denuncia as $de)                
            @if ( $expediente->id_denuncia === $de->id)
                                    {{ $de->id}}<br>
                                
                                    @endif
                                    @endforeach  
   </td>  
            <td>
            
                          
                        
            @foreach ($denuncia as $de)              
            @if ( $expediente->id_denuncia === $de->id)
                                    {{ $de->id_comision}}<br>
                                
                                    @endif
                                      
                                    @endforeach
                                </td>
                                <td>
            
                          
                                @foreach ($denuncia as $de)
                                       
            @if ( $expediente->id_denuncia === $de->id)
                                    {{ $de->Nombre_denunciante}}<br>
                                
                                    @endif
                                      
                                    @endforeach
                                </td>
                                <td>
            
                          
                                @foreach ($denuncia as $de)
                                       
            @if ( $expediente->id_denuncia === $de->id)
                                    {{ $de->estado}}<br>
                                
                                    @endif
                                      
                                 @endforeach
                                </td>
                                <td>
            
                          
                          @foreach ($denuncia as $de)
                                       
            @if ( $expediente->id_denuncia === $de->id)
                                    {{ $de->created_at}}<br>
                                
                                    @endif
                                      
                                    @endforeach
                                </td>
                                
                                
      
                </tbody>
                </table>
</div>

          



<div class="card-body">
                        <table class="table table-striped shadow pt-4" id="comision">
                            <thead class="bg-primary text-white">
                           
                            <tr>                          
<th>Descripción de la denuncia</th>
</tr>
</thead>
       <tbody>
            
            <tr>
          
                
 

<td>
@foreach ($denuncia as $de)
@if ( $expediente->id_denuncia === $de->id)
                                    {{ $de->descripcion}}
                              
                                    @endif
                                      
                                    @endforeach
                                </td>
       
                               

                </tbody>
                </table>
</div>
                   
                        
                                       
            
  
<div class="card-body">
                        <table class="table table-striped shadow-lg pt-4" id="comision">
                            <thead class="bg-primary text-white">
                <tr>
                <div class="float-left">
<span class="card-title">Declaraciones</span>
</div>
<th>Declaración: #</th>
                    <th>Nombre y Apellidos del declarante</th>
                    <th>Tipo</th>
                    <th>Declaracion de los hechos</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
         
                  @foreach ($declaraciones as $dec)
            <tr>
            <td> 
            @if ($expediente->id === $dec->id_expediente)
                                       
                                       {{ $dec->id }}
                                      
                                       @endif 
   </td>  
            <td>
            
                          
                                @if ($expediente->id === $dec->id_expediente)
                                       
                                        {{ $dec->Nombre_declarante }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                          
                                @if ($expediente->id === $dec->id_expediente)
                                       
                                        {{ $dec->cargo }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                          
                                @if ($expediente->id === $dec->id_expediente)
                                       
                                        {{ $dec->declaracion_hechos }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                          
                                @if ($expediente->id === $dec->id_expediente)
                                       
                                        {{ $dec->created_at }}
                                       
                                        @endif 
                               
                                </td>
                               
                                @endforeach
                </tbody>
                </table>
</div>

  
  
        <div class="card-body">
                        <table class="table table-striped shadow-lg pt-4" id="comision">
                            <thead class="bg-primary text-white">
                <tr>
                <div class="float-left">
<span class="card-title">Opiniones</span>
</div>

<th>Opinión: #</th>
                    <th>Nombre y Apellidos del opinante</th>
                    <th>Responsabilidad</th>
                    <th>Descripción de la opinión</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                  @foreach ($opiniones as $op)
            <tr>
            <td> 
            @if ($expediente->id === $op->id_expediente)
                                       
                                       {{ $op->id }}
                                      
                                       @endif 
   </td>  
            <td>
            
                          
                                @if ($expediente->id === $op->id_expediente)
                                       
                                        {{ $op->Nombre }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                          
                                @if ($expediente->id === $op->id_expediente)
                                       
                                        {{ $op->responsabilidad }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                          
                                @if ($expediente->id === $op->id_expediente)
                                       
                                        {{ $op->descripcion }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                          
                                @if ($expediente->id === $op->id_expediente)
                                       
                                        {{ $op->created_at }}
                                       
                                        @endif 
                               
                                </td>
                               
                                @endforeach
                </tbody>



</table>
</div>

  

  
  
<div class="card-body">
                        <table class="table table-striped shadow-lg pt-4">
                            <thead class="bg-danger text-white">
                <tr>
                <div class="float-left">
<span class="card-title">Dictámen</span>
</div>
<th>Dictámen: #</th>
                    <th>Hechos que se consideran probados</th>
                    <th>Atenuantes</th>
                    <th>Agravantes</th>
                    
                </tr>
            </thead>
            <tbody>
                  @foreach ($dictamen as $di)
            <tr>
            <td> 
            @if ($expediente->id === $di->id_expediente)
                                       
                                       {{ $di->id }}
                                      
                                       @endif 
   </td>  
            <td>
            
                          
                                @if ($expediente->id === $di->id_expediente)
                                       
                                        {{ $di->hechos }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                          
                                @if ($expediente->id === $di->id_expediente)
                                       
                                        {{ $di->atenuantes }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                          
                                @if ($expediente->id === $di->id_expediente)
                                       
                                        {{ $di->agravantes }}
                                       
                                        @endif 
                               
                                </td>
                              
                                </tbody>
                </table>

 
    <div class="card-body">
                        <table class="table table-striped shadow-lg pt-4" id="comision">
                            <thead class="bg-danger text-white">
                <tr>

    <th>Resultados del análisis del expediente académico</th>
                    <th>Tipo de falta cometida</th>
                    <th>Medida aplicada</th>
                    <th>Fecha de Creación</th>
            
                    </tr>
            </thead>
            <tbody>   
            @foreach ($dictamen as $di)
          
            <tr>       
            <td>
                  @if ($expediente->id === $di->id_expediente)
                                       
                                        {{ $di->resultadosexpacd }}
                                       
                                        @endif 
                               
                                </td>
                                <td>
            
                          
            @if ($expediente->id === $di->id_expediente)
                   
                    {{ $di->tipofalta }}
                   
                    @endif 
           
            </td>
            <td>
            
                          
            @if ($expediente->id === $di->id_expediente)
                   
                    {{ $di->medida }}
                   
                    @endif 
           
            </td>
            <td>
            
                          
            @if ($expediente->id === $di->id_expediente)
                   
                    {{ $di->created_at }}
                   
                    @endif 
           
            </td>
            @endforeach
                                @endforeach
                </tbody>
                </table>
</div>

</section>
@endsection