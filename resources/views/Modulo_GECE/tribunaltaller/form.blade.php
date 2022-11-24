<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $tribunaltaller->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tesista') }}
            <br>
            {{ Form::select('estudiante1', $estudiante1, $tribunaltaller->estudiante1, ['class' => 'form-control' . ($errors->has('estudiante1') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tesista']) }}
            {!! $errors->first('estudiante1', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tesista') }}
            <br>
            {{ Form::select('estudiante2', $estudiante2, $tribunaltaller->estudiante2, ['class' => 'form-control' . ($errors->has('estudiante2') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tesista']) }}
            {!! $errors->first('estudiante2', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tutor') }}
            <br>
            {{ Form::select('profesor1', $profesor1, $tribunaltaller->profesor1, ['class' => 'form-control' . ($errors->has('profesor1') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tutor']) }}
            {!! $errors->first('profesor1', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tutor') }}
            <br>
            {{ Form::select('profesor2', $profesor2, $tribunaltaller->profesor2, ['class' => 'form-control' . ($errors->has('profesor2') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tutor']) }}
            {!! $errors->first('profesor2', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Secretario') }}
            <br>
            {{ Form::select('secretario', $secretario, $tribunaltaller->secretario, ['class' => 'form-control' . ($errors->has('secretario') ? ' is-invalid' : ''), 'placeholder' => 'selecciona el secretario']) }}
            {!! $errors->first('secretario', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

        <div class="form-group">
            {{ Form::label('Presidente') }}
            <br>
            {{ Form::select('presidente', $presidente, $tribunaltaller->presidente, ['class' => 'form-control' . ($errors->has('presidente') ? ' is-invalid' : ''), 'placeholder' => 'selecciona el presidente']) }}
            {!! $errors->first('presidente', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

        <div class="form-group">
            {{ Form::label('Miembro') }}
            <br>
            {{ Form::select('miembro', $miembro, $tribunaltaller->miembro, ['class' => 'form-control' . ($errors->has('miembro') ? ' is-invalid' : ''), 'placeholder' => 'selecciona el miembro']) }}
            {!! $errors->first('miembro', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>