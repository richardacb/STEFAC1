<div class="row formulario-estudiantes">
    <div class="col-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Primer Nombre:') !!}
                        {!! Form::text('primer_nombre', null, [
                            'class' => 'form-control',
                            'id' => 'primer_nombre',
                            'placeholder' => 'Ingrese el primer nombre',
                        ]) !!}
                        @error('primer_nombre')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Segundo Nombre:') !!}
                        {!! Form::text('segundo_nombre', null, [
                            'class' => 'form-control',
                            'id' => 'segundo_nombre',
                            'placeholder' => 'Ingrese el segundo nombre',
                        ]) !!}
                        @error('segundo_nombre')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Primer Apellido:') !!}
                        {!! Form::text('primer_apellido', null, [
                            'class' => 'form-control',
                            'id' => 'primer_apellido',
                            'placeholder' => 'Ingrese el primer apellido',
                        ]) !!}
                        @error('primer_apellido')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Segundo Apellido:') !!}
                        {!! Form::text('segundo_apellido', null, [
                            'class' => 'form-control',
                            'id' => 'segundo_apellido',
                            'placeholder' => 'Ingrese el segundo apellido',
                        ]) !!}
                        @error('segundo_apellido')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Carnet de identidad:') !!}
                        {!! Form::text('ci', null, [
                            'class' => 'form-control',
                            'id' => 'ci',
                            'placeholder' => 'Ingrese el carnet de identidad',
                        ]) !!}
                        @error('ci')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Tipo de Usuario:') !!}
                        {!! Form::select(
                            'tipo_de_usuario',
                            [
                                'Estudiante' => 'Estudiante',
                                'Profesor' => 'Profesor',
                            ],
                            null,
                            ['class' => 'form-control', 'id' => 'tipo_de_usuario', 'placeholder' => '--Seleccione--'],
                        ) !!}
                        @error('tipo_de_usuario')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Usuario:') !!}
                        {!! Form::text('username', null, [
                            'class' => 'form-control',
                            'id' => 'username',
                            'placeholder' => 'Ingrece Organización política',
                        ]) !!}
                        @error('username')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Direccion de correo:') !!}
                        {!! Form::email('email', null, [
                            'class' => 'form-control',
                            'id' => 'email',
                            'placeholder' => 'Ingrece Organización política',
                        ]) !!}
                        @error('email')
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
                                'Primer Semestre' => 'Primer Semestre',
                                'Segundo Semestre' => 'Segundo Semestre',
                                'Tercer Semestre' => 'Tercer Semestre',
                                'Cuarto Semestre' => 'Cuarto Semestre',
                                'Quinto Semestre' => 'Quinto Semestre',
                                'Sexto Semestre' => 'Sexto Semestre',
                                'Séptimo Semestre' => 'Séptimo Semestre',
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
                            'placeholder' => 'Ingrece Tipo de curso',
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
                            'placeholder' => 'Ingrece Versión plan de estudio',
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
                        {!! Form::label('name', 'Valor opción UCI:') !!}
                        {!! Form::number('opcion_uci', null, [
                            'class' => 'form-control',
                            'id' => 'opcion_uci',
                            'placeholder' => 'Ingrece el Valor opción UCI',
                        ]) !!}
                        @error('opcion_uci')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
            </div>
        
    </div>
</div>
