@extends('adminlte::page')

@section('title', 'Horario')

@section('content_header')


@stop

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
    <nav class="navbar navbar-light float-right">
        <form class="form-block form-horizontal text-secondary" id="buscarindex" name="buscarindex" style="padding: 2rem 2rem;"
            {{--  method="GET" action="{{ url('horario/buscar') }}" --}}>
            {{ csrf_field() }}
            {{-- <div class="texto_vertical activo" style="cursor:pointer;">
            <span class="fas fa-arrow-down" style="padding: 0rem 1rem;"></span>
            <label>Filtros</label>
        </div>
        <label>Años Docentes: <strong style="color: red">*</strong></label>
      <select name="anno" class="form-control mr-sm-2 form-select" id="años" onchange="Validaraño();">
      <option value="0">--Seleccione--</option>
        <optgroup label="Año Docente">
            <option value="1">Primer Año</option>
            <option value="2">Segundo Año</option>
            <option value="3">Tercer Año</option>
            <option value="4">Cuarto Año</option>
            <option value="5">Quinto Año</option>
        </optgroup>
      </select>
      <hr>

<div style="display: none" id="semana">
    <label>Semanas: <strong style="color: red">*</strong></label>
    <select name="semana" class="form-control mr-sm-2 form-select">

      <option value="0">--Seleccione--</option>
        <optgroup label="Semana">
            <option value="1">Semana 1</option>
            <option value="2">Semana 2</option>
            <option value="3">Semana 3</option>
            <option value="4">Semana 4</option>
            <option value="5">Semana 5</option>
            <option value="6">Semana 6</option>
            <option value="7">Semana 7</option>
            <option value="8">Semana 8</option>
        </optgroup>

      </select>
      <hr>
</div>




      <div style="display: none" id="grupos">
      <label>Grupos: <strong style="color: red">*</strong></label>
      <select name="grupos" class="form-control mr-sm-2 form-select" >

        <option value="0">--Seleccione--</option>
          <optgroup label="Grupos">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
          </optgroup>

        </select>
        <hr>
    </div>


<div style="display: none" id="semana4to">
    <label>Semanas: <strong style="color: red">*</strong></label>
    <select name="semana" class="form-control mr-sm-2 form-select">

      <option value="0">--Seleccione--</option>
        <optgroup label="Semana">
            <option value="1">Semana 1</option>
            <option value="2">Semana 2</option>
            <option value="3">Semana 3</option>
            <option value="4">Semana 4</option>

        </optgroup>

      </select>
      <hr>
</div>




      <div style="display: none" id="grupos4to">
      <label>Grupos: <strong style="color: red">*</strong></label>
      <select name="grupos" class="form-control mr-sm-2 form-select" >

        <option value="0">--Seleccione--</option>
          <optgroup label="Grupos">
              <option value="1">1</option>
              <option value="2">2</option>
          </optgroup>

        </select>
        <hr>
    </div>

    <div style="display: none" id="semana1">
        <label>Semanas: <strong style="color: red">*</strong></label>
        <select name="semana" class="form-control mr-sm-2 form-select">

          <option value="0">--Seleccione--</option>
            <optgroup label="Semana">
                <option value="1">Semana 1</option>
                <option value="2">Semana 2</option>
                <option value="3">Semana 3</option>
                <option value="4">Semana 4</option>

            </optgroup>

          </select>
          <hr>
    </div>




          <div style="display: none" id="grupos1">
          <label>Grupos: <strong style="color: red">*</strong></label>
          <select name="grupos" class="form-control mr-sm-2 form-select" >

            <option value="0">--Seleccione--</option>
              <optgroup label="Grupos">
                  <option value="1">1</option>
                  <option value="2">2</option>
              </optgroup>

            </select>
            <hr>
        </div> --}}

            <div class="mb-3" style="width: 100%">
                <label for="" class="form-label">Año Docente</label>
                <input type="number" class="form-control" id="anno" name="anno"
                    placeholder="Ingrese el número del año a buscar">
                @error('anno')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            </div>
            <div class="mb-3" style="width: 100%">
                <label for="" class="form-label">Semana del Curso</label>
                <input type="number" class="form-control" id="semana" name="semana"
                    placeholder="Ingrese el número de la semana">
                @error('semana')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            </div>
            <div class="mb-3" style="width: 100%">
                <label for="" class="form-label">Grupo</label>
                <input type="text" class="form-control" id="grupo" name="grupo"
                    placeholder="Ingrese el número del grupo">
                @error('grupo')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            </div>
            <input id="boton" type="submit" class="btn btn-primary" value="Buscar">
        </form>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12" id="body_horario">

            </div>
        </div>
    </div>


@stop
@section('js')
    <script src="{{ asset('js/myjs.js') }}"></script>
@endsection
