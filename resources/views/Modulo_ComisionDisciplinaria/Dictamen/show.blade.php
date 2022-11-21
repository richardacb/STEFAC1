@extends('adminlte::page')

@section('template_title')
{{ $dictamen->name ?? 'Dictámen'}} 

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
<span class="card-title">Dictámen: #</span>
<td>{{ $dictamen->id }}</td>
</div>
<div class="float-right">
<a class="byn btn-primary btn-sm" href="{{ route('Dictamen.index')}}"> Atrás</a>
</div>

</div>

<div class="card-body">

        


<div class="mb-3">
<label for="" class="form-label">Expediente:</label> <br>
<td scope="row">
                                @foreach ($expediente as $na)
                                    @if ($dictamen->id_expediente === $na->id)
                                    
                                        {{ $na->id }}
                                    @endif
                                    
                                @endforeach

                            </td>

      </div>
     
      <div class="mb-3">
        <label for="" class="form-label">Hechos que se consideran probados:</label><br>
        <td>
{{ $dictamen->hechos }}
</td>
</div>

      
        
    
      <div class="mb-3">
        <label for="" class="form-label">Atenuantes:</label><br>
        <td>
        {{ $dictamen->atenuantes }}      
                            </td>
                            </div>
                            <div class="mb-3">
        <label for="" class="form-label">Agravantes:</label><br>
        <td>
        {{ $dictamen->agravantes }}      
                            </td>
                            </div>
                            <div class="mb-3">
        <label for="" class="form-label">Resultados del expediente académico:</label><br>
        <td>
        {{ $dictamen->resultadosexpacd }}      
                            </td>
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Tipo de Falta disciplinaria:</label><br>
        <td>
        {{ $dictamen->tipofalta }}      
                            </td>
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Medida disciplinaria impuesta:</label><br>
        <td> {{ $dictamen->medida }}      
                            </td>
                            </div>
                        <div class="mb-3">
        <label for="" class="form-label">Fecha de creación:</label><br>
        <td>{{ $dictamen->created_at }}
 </td>
                    </div>

    
                      
             

        
     

</div>
</div>
</div>
</div>









</section>
@endsection