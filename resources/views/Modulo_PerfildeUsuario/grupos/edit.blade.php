@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar Grupo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($grupos, ['route' => ['grupos.update', $grupos], 'method' => 'put']) !!}
            <div class="form-group">
                <label for="" class="form-label">Numero</label>
                 <input type="number" id="name" name="name" min="1" class="form-control" value="{{ $grupos->name }}" placeholder="Ingrese el número del grupo">
                @error('name')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="form-label">Año</label>
                @role('Vicedecana')  
                <input type="number" id="anno" min="1" max="5" name="anno"class="form-control" value="{{ $grupos->anno }}" placeholder="Ingrese el número del año">
                  @error('anno')
                  <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
                @else
                <input type="text" id="anno" name="anno"class="form-control" readonly value="{{ $annosgrupos }}">
                
                @endrole
               
            </div>

            <a href="{{ route('grupos.index') }}" class="btn btn-danger">Cancel</a>
            {!! Form::submit('Editar Grupo', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('js')
