@extends('adminlte::page')

@section('title', 'Horarios Generados')

@section('content_header')

<form method="POST" action="http://localhost/STE(Con todo en talla)/STE(Con todo en talla)/app/generar_horario/generar_horario.php" /*action="{{ route('generarhorario.generar') }}"*/>
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Sección a Impartir</label>
        <br>
        <select name="seccion" id="seccion" class="form-control mr-sm-2 form-select">
            <option value="0" selected="selected">--Seleccione--</option>
            <option value="1">Sección Mañana</option>
            <option value="2">Sección Tarde</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Año a Impartir</label>
        <br>
        <select name="anno" id="anno" class="form-control mr-sm-2 form-select">
            <option value="0" selected="selected">--Seleccione--</option>
            <option value="1"> 1er Año </option>
            <option value="2"> 2er Año </option>
            <option value="3"> 3er Año </option>
            <option value="4"> 4er Año </option>
            <option value="5"> 5er Año </option>
        </select>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Semana</label>
        <br>
        <input type="number" name="semana" id="semana" placeholder="Semana" class="form-control mr-sm-2">
      </div>
       <div class="mb-3">
          <a href="{{ route('generarhorario.index') }}" class="btn btn-danger">Cancel</a>
          <input type="submit" class="btn btn-primary" value="Generar">
      </div>
</form>

@stop
@section('js')
    <script src="{{ asset('js/generarhorario.js') }}"></script>
@endsection
