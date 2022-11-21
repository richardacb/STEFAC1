@extends('adminlte::page')

@section('template_title')
{{ $evidencia->name ?? 'Evidencia'}} 

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
<span class="card-title">Evidencia: #</span>
<td>{{ $evidencia->id }}</td>
</div>
<div class="float-right">
<a class="byn btn-primary btn-sm" href="{{ route('Evidencia.index')}}"> Atrás</a>
</div>

</div>

<div class="card-body">

        


<div class="mb-3">
<label for="" class="form-label">Expediente:</label> <br>
<td scope="row">
                                @foreach ($expediente as $na)
                                    @if ($evidencia->id_expediente === $na->id)
                                    
                                        {{ $na->id }}
                                    @endif
                                    
                                @endforeach

                            </td>

      </div>
      <div class="mb-3">
<label for="" class="form-label">Imagen:</label> <br>
<td scope="row">
      <td class="border px-14 py-1">
  <img src="{{asset('storage').'/'.$evidencia->Imagen }}" width="100%" >
  </td>
  </div>
  <div class="mb-3">
<label for="" class="form-label">Video:</label> <br>
<td scope="row">
  <td class="border px-14 py-1">
  <video src="{{asset('storage').'/'.$evidencia->Video }}" width="500" height="500" controls></video>
</td>
</div>                   
<div class="mb-3">
        <label for="" class="form-label">Fecha de creación:</label><br>
        <td>
    
    {{ $evidencia->created_at }}

    </td>
                    </div>

    
                      
             

        
     

</div>
</div>
</div>
</div>









</section>
@endsection