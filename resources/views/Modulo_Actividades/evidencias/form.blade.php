<div class="row formulario-evidencia">
    <div class="col-12">
        <fieldset class="fieldset-personalizado">
            <!--  Form Evidencia  -->
            <legend class="legend-personalizado">Evidencia</legend>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('descripcion', 'Descripcion de la Evidencia:') !!}
                        {!! Form::text('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Ingrese una descripcion']) !!}
                        @error('descripcion')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('estado', 'Estado:') !!}
                        {!! Form::select('estado',  ['1' => 'Positiva',
                        '2' => 'Negativa'], null, ['class' => 'form-control', 'id' => 'estado', 'placeholder' => '--Seleccione--']) !!}
                        @error('estado')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Actividad:') !!}
                        {!! Form::select('actividades_id', $actividad, null, ['class' => 'form-control multi-select','multiple' => 'multiple', 'id' => 'actividades_id', 'placeholder' => '--Seleccione--']) !!}
                        @error('actividades_id')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('año', 'Año:') !!}
                        {!! Form::select('actividades_id', $actividad1, null, ['class' => 'form-control multi-select','multiple' => 'multiple', 'id' => 'actividades_id', 'placeholder' => '--Seleccione--']) !!}
                        @error('actividades_id')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('imagen', 'Archivo:') !!}
                        {!! Form::file('imagen', ['class' => 'form-control', 'id' => 'imagen']) !!}
                        @error('imagen')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                    </div>
                </div>
        </fieldset>
    </div>
</div>




