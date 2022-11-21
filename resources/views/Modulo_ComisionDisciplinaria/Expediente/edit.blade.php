@extends('adminlte::page')

@section('title', 'Modificar expediente')

@section('content_header')
    <h1>Modificar expediente</h1>
@stop

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection
@if(session('mensaje'))
<div class="alert alert-success">
<p>{{ session('mensaje') }}</p>
</div>
@endif


<form action="/admin/Expediente/{{ $expediente->id  }} " method="POST">
    @csrf
    @method('PUT')
    

<div class="mb-3">
        <label for="" class="form-label">Denunciado</label><br>
        <select name="id_denunciado" id="id_denunciado" sstyle="width : 400px; class="form-control mr-sm-2 form-select">
           
            @foreach ( $denunciado as $d)
            @if ($d->id === $expediente->id_denunciado)
            <option value="{{ $d->id }}">
               {{ $d->Nombre_denunciado}}
               DENUNCIA:  {{ $d->id_denuncia}}
               </option>
            @endif
           @endforeach
           @foreach ( $denunciado as $d)
           @if ($d->id  !== $expediente->id_denunciado)
            <option value="{{ $d->id }}">
            {{ $d->Nombre_denunciado}}
               DENUNCIA:  {{ $d->id_denuncia}}
            </option>
            @endif
            @endforeach

           </select>
           @error('id_denunciado')
                <strong class="error-message text-danger"> {{ "message" }} </strong>
            @enderror
      </div>
           <div class="mb-3">
        <label for="" class="form-label">Denuncia</label><br>
        <select name="id_denuncia" id="id_denuncia" style="width : 400px; class="form-control mr-sm-2 form-select">
           @foreach ( $denuncia as $de)
            @if ($de->id == $expediente->id_denuncia)
            <option value="{{ $de->id }}">
            
               DENUNCIA:  {{ $de->id}}
               </option>
            @endif
           @endforeach
           @foreach ( $denuncia as $de)
           @if ($de->id  !== $expediente->id_denuncia)
            <option value="{{ $d->id }}">
            
               DENUNCIA:  {{ $de->id}}
            </option>
            @endif
            @endforeach
           </select>
           @error('id_denuncia')
                <strong class="error-message text-danger"> {{ "message" }} </strong>
            @enderror
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
