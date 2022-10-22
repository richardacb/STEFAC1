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
                    {{--  <div class="form-group">
                        <label for="" class="form-label">Asignaturas</label>
                        <select name="asignaturas_id" id="asignaturas_id" class="form-control mr-sm-2 form-select">
                            <option value="0" selected="selected">--Seleccione la Asignatura--</option>
                            @foreach ($asignaturas as $a)
                                <option value="{{ $a->id }}">
                                    {{ $a->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('asignaturas_id')
                            <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
                        @enderror
                    </div>  --}}

                </div>
            </div>
        </fieldset>
    </div>
</div>
