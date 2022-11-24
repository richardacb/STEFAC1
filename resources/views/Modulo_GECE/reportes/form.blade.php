<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $reporte->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Comite') }}
            <br>
            {{ Form::select('comite_id', $comite, $reporte->comite_id,['class' => 'form-control' . ($errors->has('comite_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Comité']) }}
            {!! $errors->first('comite_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>