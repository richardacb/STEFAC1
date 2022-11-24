<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Título del Comite de Trabajo de Diploma') }}
            {{ Form::text('nombre', $comite->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tesista') }}
            <br>
            {{ Form::select('estudiante_id', $estudiantes, $comite->estudiante_id, ['class' => 'form-control' . ($errors->has('estudiante_id') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tesista']) }}
            {!! $errors->first('estudiante_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tesista') }}
            <br>
            {{ Form::select('estudiante2', $estudiantes, $comite->estudiante2, ['class' => 'form-control' . ($errors->has('estudiante2') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tesista']) }}
            {!! $errors->first('estudiante2', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

        <div class="form-group">
            {{ Form::label('Tutor') }}
            <br>
            {{ Form::select('profesor_id', $profesores, $comite->profesor_id, ['class' => 'form-control' . ($errors->has('profesor_id') ? ' is-invalid' : ''), 'placeholder' => 'selecciona un tutor']) }}
            {!! $errors->first('profesor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

        <div class="form-group">
            {{ Form::label('Secretario') }}
            <br>
            {{ Form::select('secretario', $secretario, $comite->secretario, ['class' => 'form-control' . ($errors->has('secretario') ? ' is-invalid' : ''), 'placeholder' => 'selecciona el secretario']) }}
            {!! $errors->first('secretario', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

        <div class="form-group">
            {{ Form::label('Presidente') }}
            <br>
            {{ Form::select('presidente', $presidente, $comite->presidente, ['class' => 'form-control' . ($errors->has('presidente') ? ' is-invalid' : ''), 'placeholder' => 'selecciona el presidente']) }}
            {!! $errors->first('presidente', '<div class="invalid-feedback">:message</div>') !!}
        </div> 
    </div>
        <br>
         
        

    <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>