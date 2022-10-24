<div class="form-group">
    <label for="" class="form-label">Numero</label>
     <input type="number" id="name" name="name" class="form-control" >
    @error('name')
        <strong class="error-message text-danger"> {{ $message }} </strong>
    @enderror
</div>
<div class="form-group">
    <label for="" class="form-label">Año</label>
    <input type="text" id="anno" name="anno" class="form-control" value="{{ $annosgrupos }}">
    @error('asignaturas_id')
        <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
    @enderror
</div>
