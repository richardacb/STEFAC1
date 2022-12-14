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
                            'placeholder' => 'Ingrece Nombre de la madre o tutora',
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
                            'placeholder' => 'Ingrece la direccion completa',
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
                        {!! Form::label('name', 'V??a de ingreso:') !!}
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
                        {!! Form::label('name', 'Organizaci??n pol??tica:') !!}
                        {!! Form::text('organizacion_politica', null, [
                            'class' => 'form-control',
                            'id' => 'organizacion_politica',
                            'placeholder' => 'Ingrece Organizaci??n pol??tica',
                        ]) !!}
                        @error('organizacion_politica')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Situaci??n Militar:') !!}
                        {!! Form::select(
                            'situacion_militar',
                            [
                                'Diferido' => 'Diferido',
                                'Apto con recomendaciones m??dicas' => 'Apto con recomendaciones m??dicas',
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
                            'placeholder' => 'Ingrece Centro de trabajo',
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
                            'placeholder' => 'Ingrece Discapacidad',
                        ]) !!}
                        @error('discapacidad')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                {{--  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'A??o acad??mico:') !!}
                        {!! Form::select(
                            'anno',
                            [
                                'Primer A??o' => 'Primer A??o',
                                'Segundo A??o' => 'Segundo A??o',
                                'Tercer A??o' => 'Tercer A??o',
                                'Cuarto A??o' => 'Cuarto A??o',
                                'Quinto A??o' => 'Quinto A??o',
                            ],
                            null,
                            ['class' => 'form-control', 'id' => 'anno', 'placeholder' => '--Seleccione--'],
                        ) !!}
                        @error('anno')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>  --}}
                {{--  <div class="col-md-6 col-sm-12">
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
                </div>  --}}
                {{--  <div class="col-md-6 col-sm-12 form-group">
                    <label for="" class="form-label">A??o Docente</label>
                    <input type="number" class="form-control" id="anno" name="anno" value="{{ $anno }}" min="{{ $anno }}" max="{{ $anno }}">
                    @error('anno')
                        <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
                    @enderror
                </div>  --}}
                <div class="col-md-6 col-sm-12 form-group">
                    <label for="" class="form-label">Grupos</label>
                    <select name="grupos_id" id="grupos_id" class="form-control mr-sm-2 form-select">
                        <option value="0" selected="selected">--Seleccione el Grupo--</option>
                        @foreach ($grupos as $g)
                            <option value="{{ $g->id }}">
                                {{ $g->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('grupos_id')
                        <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Per??do lectivo:') !!}
                        {!! Form::select(
                            'periodo_lectivo',
                            [
                                'Primer Semestre' => 'Primer Semestre',
                                'Segundo Semestre' => 'Segundo Semestre',
                                'Tercer Semestre' => 'Tercer Semestre',
                                'Cuarto Semestre' => 'Cuarto Semestre',
                                'Quinto Semestre' => 'Quinto Semestre',
                                'Sexto Semestre' => 'Sexto Semestre',
                                'S??ptimo Semestre' => 'S??ptimo Semestre',
                                'Octavo Semestre' => 'Octavo Semestre',
                                'Noveno Semestre' => 'Noveno Semestre',
                                'Decimo Semestre' => 'Decimo Semestre',
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
                        {!! Form::label('name', 'Situaci??n escolar:') !!}
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
                                'Alta de licencia de matr??cula' => 'Alta de licencia de matr??cula',
                                'Pr??rroga de Tesis' => 'Pr??rroga de Tesis',
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
                            'placeholder' => 'Ingrece Tipo de curso',
                        ]) !!}
                        @error('tipo_curso')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Versi??n plan de estudio:') !!}
                        {!! Form::text('plan_estudio', null, [
                            'class' => 'form-control',
                            'id' => 'plan_estudio',
                            'placeholder' => 'Ingrece Versi??n plan de estudio',
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
                            'placeholder' => 'Ingrece Organizacion de P.E',
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
                            'placeholder' => 'Ingrece Cohorte estudiantil',
                        ]) !!}
                        @error('cohorte_estudiantil')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Valor opci??n UCI:') !!}
                        {!! Form::number('opcion_uci', null, [
                            'class' => 'form-control',
                            'id' => 'opcion_uci',
                            'placeholder' => 'Ingrece el Valor opci??n UCI',
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
