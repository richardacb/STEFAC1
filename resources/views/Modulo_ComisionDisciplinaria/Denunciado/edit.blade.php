@extends('adminlte::page')

@section('title', 'Modificar denunciado')

@section('content_header')
    <h1>Modificar denunciado</h1>
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

<form action="/admin/Denunciado/{{ $denunciado->id  }} " method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="" class="form-label">Denunciado</label><br>
                <select name="Nombre_denunciado" id="Nombre_denunciado" class="form-control mr-sm-2 form-select"style="width : 500px;>
                    <option value="0" selected="selected">--Seleccione--</option>
                    @foreach ($users as $user)
                    @if ($user->id === $denunciado->Nombre_denunciado)
                        <option value="{{ $user->primer_nombre}} {{ $user->segundo_nombre}} {{ $user->primer_apellido}} {{ $user->segundo_apellido}}">
                        {{ $user->primer_nombre}} {{ $user->segundo_nombre}} {{ $user->primer_apellido}} {{ $user->segundo_apellido}}
                        </option>
                        @endif
                    @endforeach
                    @foreach ($users as $user)
                    @if ($user->id !== $denunciado->Nombre_denunciado)
                        <option value="{{ $user->primer_nombre}} {{ $user->segundo_nombre}} {{ $user->primer_apellido}} {{ $user->segundo_apellido}}">
                        {{ $user->primer_nombre}} {{ $user->segundo_nombre}} {{ $user->primer_apellido}} {{ $user->segundo_apellido}}
                        </option>
                        @endif
                    @endforeach
                </select>
                @error('user_id')
                <strong class="error-message text-danger"> {{ 'Campo Requerido' }} </strong>
            @enderror
            </div>
    
       
        <div class="form-group">
        <label for="" class="form-label">Denuncia</label><br>
       
        <select name="id_denuncia" id="id_denuncia"  class="form-control mr-sm-2 form-select">
            
      @foreach ( $denuncia as $na)
            @if ($na->id === $denunciado->id_denuncia)
            <option value="{{ $na->id }}">
                {{ $na->id }}
            </option>
            @endif
            @endforeach
            @foreach ( $denuncia as $na)
            @if ($na->id !== $denunciado->id_denuncia)
            <option value="{{ $na->id }}">
                {{ $na->id }}
            </option>
            @endif
            @endforeach
        </select>
        @error('id_denuncia')
                <strong class="error-message text-danger"> {{ "$message" }} </strong>
            @enderror
      </div>
      
    
      
      
      
      <div class="mb-3">
          <a href="{{ route('Denunciado.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
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
