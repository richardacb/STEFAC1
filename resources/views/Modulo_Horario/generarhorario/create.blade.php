@extends('adminlte::page')

@section('title', 'Horarios Generados')

@section('content_header')

<form method="POST" action="http://localhost/STEFAC1/app/generar_horario/generar_horario.php" /*action="{{ route('generarhorario.generar') }}"*/ id="generarhorario">
    @csrf
    <div class="mb-3"  >
        <strong class="error-message text-danger" id="error_horario"></strong>
    </div>
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
        <input type="number" class="form-control" id="anno" name="anno" value="{{ $anno }}"
        min="{{ $anno }}" max="{{ $anno }}" >

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
    <script src="{{ asset('js/validargenerarhorario.js') }}"></script>
@endsection
