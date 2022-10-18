<div class="row formulario-estudiantes">
    <div class="col-12">
        <fieldset class="fieldset-personalizado">
            <legend class="legend-personalizado">Datos personales del profesor</legend>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    {{--  <div class="form-group">
                        <label for="" class="form-label">Años Académicos</label>
                        <select name="anno" id="annoprof" class="form-control mr-sm-2 form-select">
                            <option value="{{ $anno }}" selected="selected">{{$anno}}</option>
                        </select>
                        @error('anno')
                            <strong class="error-message text-danger"> {{ 'Campos Requeridos' }} </strong>
                        @enderror
                    </div>  --}}
                    <div class="form-group">
                        <label for="" class="form-label">Grupos</label>
                        <select name="grupos_id" id="grupos_idprof" class="form-control mr-sm-2 form-select">
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
                    </div>

                </div>
            </div>
        </fieldset>
    </div>
</div>
