@extends('adminlte::page')

@section('template_title')
{{ $opiniones->name ?? 'Opinión'}} 

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
<span class="card-title">Opiniones</span>
</div>
<div class="float-right">
<a class="byn btn-primary btn-sm" href="{{ route('Opiniones.index')}}"> Atrás</a>
</div>
</div>

<div class="card-body">

<div class="mb-3">
        <label for="" class="form-label">Nombre del opinante:</label>
        <td>
        {{ $opiniones->Nombre}}
</td>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Responsabilidad o cargo:</label>
        <td>
{{ $opiniones->responsabilidad }}
</td>
</div>


      <div class="mb-3">
        <label for="" class="form-label">Opinión:</label>
        <td>
{{ $opiniones->descripcion}}


</td>
</div>   
    


        <div class="mb-3">
        <label for="" class="form-label">Fecha de creación:</label>
        
        <td>


    
    {{ $opiniones->created_at}}
   


</td>


<div class="mb-3">
        <label for="" class="form-label">Expediente:</label>
     
<td scope="row">
                                @foreach ($expediente as $na)
                                    @if ($opiniones->id_expediente === $na->id)
                                    
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