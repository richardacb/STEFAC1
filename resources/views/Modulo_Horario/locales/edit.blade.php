@extends('adminlte::page')

@section('title', 'Editar Local')

@section('content_header')
    <h1>Editar Local</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-succes">
        <strong>{{ session('info') }}</strong>
    </div>

@endif
<form action="/admin/locales/{{ $l->id  }} " method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Local</label>
        <input type="text" class="form-control" id="local" name="local" placeholder="Ingrese el Local" value="{{ $l->local }}">
        @error('local')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Tipo de Local</label>
        <select name="tipo_de_locales" id="tipo_de_locales" class="form-control mr-sm-2 form-select">
            <option value="0" selected="selected">--Seleccione--</option>
            @foreach ( $tipo_de_locales as $t)
            <option value="{{ $t->id }}">
                {{ $t->tipo }}
            </option>
            @endforeach
        </select>
        @error('tipo_de_locales')
        <strong class="error-message text-danger"> {{ "Campos Requeridos" }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Disponibilidad</label>
        <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" placeholder="Ingrese 1 si el local esta disponible, 0 sino lo está." value="{{ $l->disponibilidad }}">
        @error('disponibilidad')
        <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
          <a href="{{ route('locales.index') }}" class="btn btn-danger">Cancelar</a>
          <input type="submit" class="btn btn-primary" value="Editar">
      </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
