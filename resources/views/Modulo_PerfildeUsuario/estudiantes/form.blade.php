<div class="row formulario-estudiantes">
    <div class="col-12">
        <fieldset class="fieldset-personalizado">
            <legend class="legend-personalizado">Datos personales del estudiante</legend>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre de la madre o tutora:') !!}
                        {!! Form::text('nombre_madre', null, [
                            'class' => 'form-control',
                            'id' => 'nombre_madre',
                            'placeholder' => 'Ingrese Nombre de la madre o tutora',
                        ]) !!}
                        @error('nombre_madre')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Direccion completa:') !!}
                        {!! Form::textarea('direccion_completa', null, [
                            'class' => 'form-control',
                            'rows' => 1,
                            'id' => 'direccion_completa',
                            'placeholder' => 'Ingrese la direccion completa',
                        ]) !!}
                        @error('direccion_completa')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Tipo estudiante:') !!}
                        <br>
                        @foreach ($tipo_estudiante as $tipo_est)
                            {!! Form::radio('tipo_estudiante', $tipo_est, null, ['id' => 'tipo_estudiante']) !!}
                            {{ $tipo_est }} <br>
                        @endforeach
                        @error('tipo_estudiante')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Vía de ingreso:') !!}
                        {!! Form::select(
                            'via_ingreso',
                            [
                                'IPU' => 'IPU',
                                'Concurso' => 'Concurso',
                                'EXTR' => 'EXTR',
                                'MINFAR' => 'MINFAR',
                                'Orden 18' => 'Orden 18',
                                'Otros' => 'Otros',
                                'Nacional' => 'Nacional',
                                'MININT' => 'MININT',
                                'EIDE' => 'EIDE',
                            ],
                            null,
                            ['class' => 'form-control', 'id' => 'via_ingreso', 'placeholder' => '--Seleccione--'],
                        ) !!}
                        @error('via_ingreso')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Organización política:') !!}
                        {!! Form::text('organizacion_politica', null, [
                            'class' => 'form-control',
                            'id' => 'organizacion_politica',
                            'placeholder' => 'Ingrese Organización política',
                        ]) !!}
                        @error('organizacion_politica')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Situación Militar:') !!}
                        {!! Form::select(
                            'situacion_militar',
                            [
                                'Diferido' => 'Diferido',
                                'Apto con recomendaciones médicas' => 'Apto con recomendaciones médicas',
                                'Apto servicio Alternativo' => 'Apto servicio Alternativo',
                                'No Apto (Directo)' => 'No Apto (Directo)',
                                'No Apto (Diferido)' => 'No Apto (Diferido)',
                                'Orden 18' => 'Orden 18',
                                'SMG' => 'SMG',
                                'Desconocido' => 'Desconocido',
                            ],
                            null,
                            ['class' => 'form-control', 'id' => 'situacion_militar', 'placeholder' => '--Seleccione--'],
                        ) !!}
                        @error('situacion_militar')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Centro de trabajo:') !!}
                        {!! Form::text('centro_trabajo', null, [
                            'class' => 'form-control',
                            'id' => 'centro_trabajo',
                            'placeholder' => 'Ingrese Centro de trabajo',
                        ]) !!}
                        @error('centro_trabajo')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Discapacidad:') !!}
                        {!! Form::text('discapacidad', null, [
                            'class' => 'form-control',
                            'id' => 'discapacidad',
                            'placeholder' => 'Ingrese Discapacidad',
                        ]) !!}
                        @error('discapacidad')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                 <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Grupos:') !!}
                        {!! Form::select('grupos_id', $grupos, null, [
                            'class' => 'form-control',
                            'id' => 'grupos_id',
                            'placeholder' => '--Seleccione--',
                        ]) !!}
                        @error('grupos_id')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-12">
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
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Situación escolar:') !!}
                        {!! Form::select(
                            'situacion_escolar',
                            [
                                'Promovido' => 'Promovido',
                                'Promovido con 1 Arrastre' => 'Promovido con 1 Arrastre',
                                'Promovido con 2 Arrastre' => 'Promovido con 2 Arrastre',
                                'Nuevo Ingreso' => 'Nuevo Ingreso',
                                'Reingreso' => 'Reingreso',
                                'Reincorporado Sancionado' => 'Reincorporado Sancionado',
                                'Repitente' => 'Repitente',
                                'Alta de licencia de matrícula' => 'Alta de licencia de matrícula',
                                'Prórroga de Tesis' => 'Prórroga de Tesis',
                            ],
                            null,
                            ['class' => 'form-control', 'id' => 'situacion_escolar', 'placeholder' => '--Seleccione--'],
                        ) !!}
                        @error('situacion_escolar')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Tipo de curso:') !!}
                        {!! Form::text('tipo_curso', null, [
                            'class' => 'form-control',
                            'id' => 'tipo_curso',
                            'placeholder' => 'Ingrese Tipo de curso',
                        ]) !!}
                        @error('tipo_curso')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Versión plan de estudio:') !!}
                        {!! Form::text('plan_estudio', null, [
                            'class' => 'form-control',
                            'id' => 'plan_estudio',
                            'placeholder' => 'Ingrese Versión plan de estudio',
                        ]) !!}
                        @error('plan_estudio')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Organizacion de P.E:') !!}
                        {!! Form::text('organizacion_pe', null, [
                            'class' => 'form-control',
                            'id' => 'organizacion_pe',
                            'placeholder' => 'Ingrese Organizacion de P.E',
                        ]) !!}
                        @error('organizacion_pe')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Cohorte estudiantil:') !!}
                        {!! Form::text('cohorte_estudiantil', null, [
                            'class' => 'form-control',
                            'id' => 'cohorte_estudiantil',
                            'placeholder' => 'Ingrese Cohorte estudiantil',
                        ]) !!}
                        @error('cohorte_estudiantil')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Valor opción UCI:') !!}
                        {!! Form::number('opcion_uci', null, [
                            'class' => 'form-control',
                            'id' => 'opcion_uci',
                            'placeholder' => 'Ingrese el Valor opción UCI',
                        ]) !!}
                        @error('opcion_uci')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
