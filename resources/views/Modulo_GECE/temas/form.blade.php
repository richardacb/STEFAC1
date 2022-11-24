<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $tema->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tesista') }}
            <br>
            {{ Form::select('estudiante1', $estudiante1, $tema->estudiante1, ['class' => 'form-control' . ($errors->has('estudiante1') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tesista']) }}
            {!! $errors->first('estudiante1', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tesista') }}
            <br>
            {{ Form::select('estudiante2', $estudiante2, $tema->estudiante2, ['class' => 'form-control' . ($errors->has('estudiante2') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tesista']) }}
            {!! $errors->first('estudiante2', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tutor') }}
            <br>
            {{ Form::select('profesor1', $profesor1, $tema->profesor1, ['class' => 'form-control' . ($errors->has('profesor1') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tutor']) }}
            {!! $errors->first('profesor1', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tutor') }}
            <br>
            {{ Form::select('profesor2', $profesor2, $tema->profesor2, ['class' => 'form-control' . ($errors->has('profesor2') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tutor']) }}
            {!! $errors->first('profesor2', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>