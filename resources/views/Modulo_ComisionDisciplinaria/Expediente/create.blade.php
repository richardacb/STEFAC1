@extends('adminlte::page')

@section('title', 'Crear Expediente')

@section('content_header')
    <h1>Crear Expediente</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
<form action="{{ route('Expediente.store') }}" method="POST">
@csrf
    <br>
       
    
    
        


<div class="mb-3">
        <label for="" class="form-label">Denunciado</label>
        <select name="id_denunciado" id="id_denunciado" class="form-control mr-sm-2 form-select"style="width : 400px;>
            <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $denunciado as $d)
         
            <option value="{{ $d->id }}">
               {{ $d->Nombre_denunciado}}
               DENUNCIA: {{ $d->id_denuncia}}
               
              
           @endforeach
           </select>
             
           </div>
           <div class="mb-3">
        <label for="" class="form-label">Denuncia en proceso</label>
        <select wire:model="id_denuncia" name="id_denuncia" id="id_denuncia" class="form-control mr-sm-2 form-select"style="width : 400px;>
            <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $denuncia as $de)
            <option value="{{ $de->id }}">
               
               DENUNCIA: {{ $de->id}}
               
              
           @endforeach
           </select>
           </div>
         
          
         
           


           
      
          
        
    
    

           

        
    


     


      
           <div class="mb-3">
          <a href="{{ route('Expediente.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
          <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-plus-circle"></i></button>
      </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
