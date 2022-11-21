@extends('adminlte::page')

@section('title', 'Modificar dictámen')

@section('content_header')
    <h1>Modificar dictámen</h1>
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


<form action="/admin/Dictamen/{{ $dictamen->id  }}" method="POST">
    @csrf
    @method('PUT')
   
      <div class="mb-3">
        <label for="" class="form-label">Expediente:</label>
        <br>
        <select name="id_expediente" id="id_expediente" style="width : 500px; class="form-control mr-sm-2 form-select">
       
            @foreach ( $expediente as $na)
            <option value="{{ $na->id }}">
                {{ $na->id }}
            </option>
           
            @endforeach
        </select>
        
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Hechos que se consideran probados</label><br>
        <input type="text" style="width : 500px;class="form-control" id="hechos" name="hechos" value="{{ $dictamen->hechos }}">
        @error('hechos')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Atenuantes</label><br>
        <input type="text" style="width : 500px;class="form-control" id="atenuantes" name="atenuantes" value="{{ $dictamen->atenuantes }}">
        @error('atenuantes')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Agravantes</label><br>
        <input type="text" style="width : 500px;class="form-control" id="agravantes" name="agravantes" value="{{ $dictamen->agravantes}}">
        @error('agravantes')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Resultados del análisis del expediente académico</label><br>
        <input type="text" style="width : 500px;class="form-control" id="resultadosexpacd" name="resultadosexpacd" value="{{ $dictamen->resultadosexpacd}}">
        @error('resultadosexpacd')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Tipo de falta cometida</label>
        <br> <br>
        <select name="tipofalta">
        <option value="{{$dictamen->tipofalta}}">{{$dictamen->tipofalta}}</option> 
        <option value="Muy Grave">Muy Grave</option> 
        <option value="Grave">Grave</option> 
        <option value="Menos Grave">Menos Grave</option>
       </select><br>
         @error('tipofalta')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Medida Disciplinaria a imponer por tipo de falta:</label>
        <br> <br>
        <select name="medida">
        <option value="{{$dictamen->medida}}">{{$dictamen->medida}}</option> 
        <option value="Expulsión de la Educación Superior">Expulsión de la Educación Superior <h2>(Falta Muy Grave)</h2></option> 
        <option value="Separación indefinida de la Educación Superior">Separación indefinida de la Educación Superior <h2>(Falta Muy Grave)</h2></option> 
        <option value="Separación de 3 a 5 cursos de la Educación Superior">Separación de 3 a 5 cursos de la Educación Superior <h2>(Falta Muy Grave)</h2></option>
        <option value="Separación hasta tres cursos de la educación superior.">Separación hasta tres cursos de la educación superior <h2> (Falta Grave)</h2></option> 
        <option value="Pérdida de sus derechos como becario por un semestre y hasta dos curso.">Pérdida de sus derechos como becario por un semestre y hasta dos curso <h2>(Falta Grave)</h2></option> 
        <option value="Separación por uno o dos cursos de la educación superior">Separación por uno o dos cursos de la educación superior <h2> (Falta Menos Grave)</h2></option> 
        <option value="Amonestación pública ante el colectivo estudiantil">Amonestación pública ante el colectivo estudiantil <h2> (Falta Menos Grave)</h2></option> 
        <option value="Pérdida de sus derechos como becario de uno a seis meses">Pérdida de sus derechos como becario de uno a seis meses <h2> (Falta Menos Grave)</h2></option>
        <option value="Ofrecer una satisfacción al estudiante, trabajador, persona o colectivo que haya ofendido">Ofrecer una satisfacción al estudiante, trabajador, persona o colectivo que haya ofendido <h2> (Falta Menos Grave)</h2></option>
        <option value="Reparar cuando ello sea posible, en el plazo perentorio que se le fije, el daño ocasionado">Reparar cuando ello sea posible, en el plazo perentorio que se le fije, el daño ocasionado <h2> (Falta Menos Grave)</h2></option>
        
       
      </select><br>
      La pérdida de la beca no significa afectación docente
         @error('medida')
         <strong class="error-message text-danger"> {{ "$message" }} </strong>
        @enderror
      </div>


      
      <div class="mb-3">
          <a href="{{ route('Dictamen.index') }}" class="btn btn-danger btn-lg"><i class="bi bi-x-circle"></i></a>
          <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-plus-circle"></i></button>
      </div>
</form>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

 <script src="{{ asset('js/myjs.js') }}" defer></script>
 @stop

      