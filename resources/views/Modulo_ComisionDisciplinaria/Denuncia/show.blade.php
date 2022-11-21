@extends('adminlte::page')

@section('template_title')
{{ $denuncia->name ?? 'Denuncia'}} 

@endsection


@section('content')
<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
<section class="content container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<div class="float-left">
<span class="card-title">Denuncias</span>
</div>
<div class="float-right">
<a class="byn btn-primary btn-sm" href="{{ route('Denuncia.index')}}"> Atrás</a>
</div>

</div>

<div class="card-body">
<div class="mb-3">
<label for="" class="form-label">Denuncia:</label> <br>
 <td>
        {{ $denuncia->id }}
</td>
      </div>


<div class="mb-3">
<label for="" class="form-label">Nombre y Apellidos del Denunciante:</label> <br>
 <td>
        {{ $denuncia->Nombre_denunciante }}
</td>
      </div>
     
      <div class="mb-3">
        <label for="" class="form-label">Descripción:</label><br>
        <td>
{{ $denuncia->descripcion }}
</td>
</div>

      
        
    
      <div class="mb-3">
        <label for="" class="form-label">Comisión:</label><br>
        <td scope="row">
                                @foreach ($nombrecomision as $na)
                                    @if ($denuncia->id_comision === $na->id)
                                       Comisión: {{ $na->Nombre_comision }}<br>
                                       Presidente: {{ $na->Presidente }}<br>
                                       Secretario: {{ $na->Miembro }}<br>
                                       Miembro: {{ $na->miemb }}<br>
                                    @endif
                                @endforeach

                            </td>
                            </div>

 <div class="mb-3">
        <label for="" class="form-label">Estado:</label><br>
        <td>
{{ $denuncia->estado }}
</td>
</div>


        <div class="mb-3">
        <label for="" class="form-label">Fecha de creación:</label><br>
        <td>


    
    {{ $denuncia->created_at }}
   



                    </td>
                    </div>

                    <div class="mb-3">
                    <label for="" class="form-label">Denunciados:</label><br>
                    <td>
                    
                
                @foreach ($denunciado as $de)
                <tr>
                <td>
                
                              
                                    @if ($denuncia->id === $de->id_denuncia)
                                            {{ $de->Nombre_denunciado }}
                                            @endif 
                                   
                                    </td>
    
                                    <br>
    
                        </tr>
                    @endforeach

        
     

</div>
</div>
</div>
</div>









</section>
@endsection