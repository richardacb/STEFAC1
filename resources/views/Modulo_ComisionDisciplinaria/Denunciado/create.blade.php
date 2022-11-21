@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Crear Denunciado</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
@endsection

    <div class="card-body">
        {!! Form::open(['route' => 'Denunciado.store']) !!}
  
            {!! Form::label('name', 'Nombre de los estudiantes:') !!}
            <div class="form-group">
                <select name="Nombre_denunciado" id="Nombre_denunciado" class="form-control mr-sm-2 form-select"style="width : 500px;>
                    <option value="0" selected="selected">--Seleccione--</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->primer_nombre}} {{ $user->segundo_nombre}} {{ $user->primer_apellido}} {{ $user->segundo_apellido}}">
                        {{ $user->primer_nombre}} {{ $user->segundo_nombre}} {{ $user->primer_apellido}} {{ $user->segundo_apellido}}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                <strong class="error-message text-danger"> {{ 'Campo Requerido' }} </strong>
            @enderror
            </div>
        </div>
       
       
  

<div class="mb-3">
        <label for="" class="form-label">Denuncia:</label><br>
        <select name="id_denuncia" id="id_denuncia" class="form-control mr-sm-2 form-select"style="width : 500px;>
        <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $denuncia as $na)
            <option value="{{ $na->id }}">
                Denuncia: {{ $na->id }} Denunciante: {{ $na-> Nombre_denunciante }} 

            </option>
           
            @endforeach
        </select>
        
      </div>

      <div class="mb-3">
          <a href="{{ route('Denunciado.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
          <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-plus-circle"></i></button>
      </div>
</form>
@stop
@section('js')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
{{--  <script src="{{ asset('js/estudiantesperfil.js') }}" defer></script>  --}}
@endsection
