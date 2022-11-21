@extends('adminlte::page')

@section('template_title')
{{ $declaraciones->name ?? 'Declaración'}} 

@endsection


@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<section class="content container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<div class="float-left">
<span class="card-title">Declaraciones</span>
</div>
<div class="float-right">
<a class="byn btn-primary btn-sm" href="{{ route('Declaraciones.index')}}"> Atrás</a>
</div>
</div>

<div class="card-body">

<div class="mb-3">
        <label for="" class="form-label">Nombre del declarante:</label>
        <td>
        {{ $declaraciones->Nombre_declarante}}
</td>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Responsabilidad o cargo:</label>
        <td>
{{ $declaraciones->cargo }}
</td>
</div>


      <div class="mb-3">
        <label for="" class="form-label">Declaración de los hechos:</label>
        <td>
{{ $declaraciones->declaracion_hechos}}


</td>
</div>   
    


        <div class="mb-3">
        <label for="" class="form-label">Fecha de creación:</label>
        
        <td>


    
    {{ $declaraciones->created_at}}
   


</td>


<div class="mb-3">
        <label for="" class="form-label">Expediente:</label>
     
<td scope="row">
                                @foreach ($expediente as $na)
                                    @if ($declaraciones->id_expediente === $na->id)
                                    
                                        {{ $na->id }}<br>
                                      
                                    
                                    @endif
                                    
                                @endforeach

                            </td>
                             
           
        
      </div>

</div>
</div>
</div>
</div>
</section>
@endsection