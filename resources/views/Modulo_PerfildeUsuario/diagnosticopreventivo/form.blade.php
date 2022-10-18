<div class="row formulario-estudiantes">
    <div class="col-12">
        <fieldset class="fieldset-personalizado">
            <!--  Diagnostico preventivo  -->
            <legend class="legend-personalizado-dp">Diagnostico preventivo</legend>
            <div class="row">
            
               <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Nacionalidad:') !!}
                        {!! Form::text('nacionalidad', null, ['class' => 'form-control', 'id' => 'nacionalidad', 'placeholder' => 'Ingrece la Nacionalidad']) !!}
                        @error('nacionalidad')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h2 class="h3">Adicciones</h2>
                </div>
                
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Alcohol:') !!}
                        <br>
                        @foreach ($adicciones_Alcohol as $alcohol)
                        {!! Form::radio('adicciones_Alcohol', $alcohol, null, ['id' => 'adicciones_Alcohol']) !!}
                            {{ $alcohol }} <br>
                        @error('adicciones_Alcohol')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Tabaco:') !!}
                        <br>
                        @foreach ($adicciones_Tabaco as $Tabaco)
                        {!! Form::radio('adicciones_Tabaco', $Tabaco, null, ['id' => 'adicciones_Tabaco']) !!}
                            {{ $Tabaco }} <br>
                        @error('adicciones_Tabaco')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Café:') !!}
                        <br>
                        @foreach ($adicciones_Café as $Café)
                        {!! Form::radio('adicciones_Café', $Café, null, ['id' => 'adicciones_Café']) !!}
                            {{ $Café }} <br>
                        @error('adicciones_Café')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Tecnoadicciones:') !!}
                        <br>
                        @foreach ($adicciones_Tecnoadicciones as $Tecnoadicciones)
                        {!! Form::radio('adicciones_Tecnoadicciones', $Tecnoadicciones, null, ['id' => 'adicciones_Tecnoadicciones']) !!}
                            {{ $Tecnoadicciones }} <br>
                        @error('adicciones_Tecnoadicciones')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Drogas:') !!}
                        <br>
                        @foreach ($adicciones_Drogas as $Drogas)
                        {!! Form::radio('adicciones_Drogas', $Drogas, null, ['id' => 'adicciones_Drogas']) !!}
                            {{ $Drogas }} <br>
                        @error('adicciones_Drogas')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h2 class="h3">Grupos Sociales y Creencias Religiosas</h2>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Grupos Sociales:') !!}
                        <br>
                        @foreach ($grupo_social as $gs)
                        {!! Form::radio('grupo_social', $gs, null, ['id' => 'grupo_social']) !!}
                            {{ $gs }} <br>
                        @error('grupo_social')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Creencias Religiosas:') !!}
                        <br>
                        @foreach ($creencia_religiosa as $cr)
                        {!! Form::radio('creencia_religiosa', $cr, null, ['id' => 'creencia_religiosa']) !!}
                            {{ $cr }} <br>
                        @error('creencia_religiosa')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h2 class="h3">Medicamentos</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Medicamentos:') !!}
                        <br>
                        @foreach ($tipo_medicamentos as $Medicamentos)
                        {!! Form::radio('tipo_medicamentos', $Medicamentos, null, ['id' => 'tipo_medicamentos']) !!}
                            {{ $Medicamentos }} <br>
                        @error('tipo_medicamentos')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                        @endforeach
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Consumo de Medicamentos:') !!}
                        {!! Form::textarea('tipo_medicamentos_consumo', null, ['class' => 'form-control', 'rows' => 1, 'id' => 'tipo_medicamentos_consumo', 'placeholder' => 'Ingrece el medicamento que consume']) !!}
                        @error('tipo_medicamentos_consumo')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
               
               
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Tipo de problemas:') !!}
                        {!! Form::text('tipos_de_problemas', null, ['class' => 'form-control', 'id' => 'tipos_de_problemas', 'placeholder' => 'Ingrece Tipo de problemas']) !!}
                        @error('tipos_de_problemas')
                            <strong class="error-message text-danger"> {{ $message }} </strong>
                        @enderror
                    </div>
                </div>
            </div>
        </fieldset>

    </div>
</div>