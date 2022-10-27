<div class="row formulario-actividades">
    <div class="col-12">
        <fieldset class="fieldset-personalizado">
            <!--  Detalles del perfil  -->
            <legend class="legend-personalizado">Actividad</legend>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre de la actividad:') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese el nombre']) !!}
                        @error('nombre')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('año', 'Año:') !!}
                        {!! Form::text('año', null, ['class' => 'form-control', 'id' => 'año', 'placeholder' => 'Ingrece el año']) !!}
                        @error('año')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tipo_actividad', 'Tipo de Actividad:') !!}
                    {!! Form::select('tipo_actividad', [
                        'Político Ideológico' => 'Político Ideológico',
                        'Académico' => 'Académico',
                        'Investigativa' => 'Investigativa',
                        'Extensión Universitaria' => 'Extensión Universitaria'
                    ], null, ['class' => 'form-control', 'id' => 'tipo_actividad', 'placeholder' => '--Seleccione--']) !!}
                    @error('tipo_actividad')
                        <strong class="error-message text-danger"> {{ $message }} </strong>
                    @enderror
                </div>
            </div>
        </fieldset>
    </div>
</div>
