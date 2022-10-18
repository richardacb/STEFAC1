<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name','placeholder' => 'Ingrese el nombre del Grupo IDF...']) !!}
    @error('name')
            <strong class="error-message text-danger"> {{ $message }} </strong>
        @enderror
</div>
<div class="form-group">
    <label for="" class="form-label">Año</label>
    <input type="text"  id="anno" name="anno" class="form-control" value="{{ $annosgrupos }}">
    @error('asignaturas_id')
        <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
    @enderror
</div>
