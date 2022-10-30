<div class="row formulario-estudiantes">
    <div class="col-12">
        <fieldset class="fieldset-personalizado">
            <legend class="legend-personalizado">Datos personales del profesor</legend>
            <div class="row">
                <div class="col-sm-12 col-md-6">


                    <div class="form-group">
                        {!! Form::label('name', 'Grupos:') !!}
                        {!! Form::select('grupos_id', $grupos, null, [
                            'class' => 'form-control',
                            'id' => 'grupos_idprof',
                            'placeholder' => '--Seleccione--',
                        ]) !!}
                        @error('grupos_id')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Tipo de clases:') !!}
                        {!! Form::text('tipo_de_clases', null, [
                            'class' => 'form-control',
                            'id' => 'tipo_de_clases',
                            'placeholder' => 'Ingrese el tipo de clase',
                        ]) !!}
                        @error('tipo_de_clases')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                    
                        <div class="form-group">
                            {!! Form::label('name', 'Perído lectivo:') !!}
                            {!! Form::select(
                                'periodo_lectivo',
                                [
                                    '1' => 'Primer Semestre',
                                    '2' => 'Segundo Semestre',
                                    '3' => 'Tercer Semestre',
                                    '4' => 'Cuarto Semestre',
                                    '5' => 'Quinto Semestre',
                                    '6' => 'Sexto Semestre',
                                    '7' => 'Séptimo Semestre',
                                    '8' => 'Octavo Semestre',
                                    '9' => 'Noveno Semestre',
                                    '10' => 'Decimo Semestre',
                                ],
                                null,
                                ['class' => 'form-control', 'id' => 'periodo_lectivo', 'placeholder' => '--Seleccione--'],
                            ) !!}
                            @error('periodo_lectivo')
                                <strong class="error-message text-danger"> {{ $message }} </strong>
                            @enderror
                        </div>
                  
                    <div class="form-group">
                        {!! Form::label('name', 'Asignaturas:') !!}
                        {!! Form::select('asignaturas_id', $asignaturas, null, [
                            'class' => 'form-control',
                            'id' => 'asignaturas_id',
                            'placeholder' => '--Seleccione--',
                        ]) !!}
                        @error('asignaturas_id')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
