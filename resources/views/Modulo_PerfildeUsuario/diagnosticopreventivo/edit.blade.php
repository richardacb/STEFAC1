@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Editar Diagnostico preventivo</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection
<form action="{{ url('admin/diagnosticopreventivo/' . $diagnosticopreventivo->id) }}" method="post"
    enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre del estudiante:</p>

            <p class="form-control">{{ $diagnosticopreventivo->users->primer_nombre }}
                {{ $diagnosticopreventivo->users->segundo_nombre }} {{ $diagnosticopreventivo->users->primer_apellido }}
                {{ $diagnosticopreventivo->users->segundo_apellido }}</p>
            {!! Form::model($diagnosticopreventivo, [
                'route' => ['diagnosticopreventivo.update', $diagnosticopreventivo->id],
                'method' => 'put',
            ]) !!}
            <div class="row formulario-estudiantes">
                <div class="col-12">
                    <fieldset class="fieldset-personalizado">
                        <!--  Diagnostico preventivo  -->
                        <legend class="legend-personalizado-dp">Diagnostico preventivo </legend>
                        <div class="row">
            
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Nacionalidad:') !!}
                                    {!! Form::text('nacionalidad', null, [
                                        'class' => 'form-control',
                                        'id' => 'nacionalidad',
                                        'placeholder' => 'Ingrece la Nacionalidad',
                                    ]) !!}
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
                                    {!! Form::select('adicciones_Alcohol', $adicciones_Alcohol, null, [
                                        'class' => 'form-control',
                                        'id' => 'adicciones_Alcohol',
                                        'placeholder' => '--Seleccione--',
                                    ]) !!}
                                    @error('adicciones_Alcohol')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Tabaco:') !!}
                                    {!! Form::select('adicciones_Tabaco', $adicciones_Tabaco, null, [
                                        'class' => 'form-control',
                                        'id' => 'adicciones_Tabaco',
                                        'placeholder' => '--Seleccione--',
                                    ]) !!}
                                    @error('adicciones_Tabaco')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Café:') !!}
                                    {!! Form::select('adicciones_Café', $adicciones_Café, null, [
                                        'class' => 'form-control',
                                        'id' => 'adicciones_Café',
                                        'placeholder' => '--Seleccione--',
                                    ]) !!}
                                    @error('adicciones_Café')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Tecnoadicciones:') !!}
                                    {!! Form::select('adicciones_Tecnoadicciones', $adicciones_Tecnoadicciones, null, [
                                        'class' => 'form-control',
                                        'id' => 'adicciones_Tecnoadicciones',
                                        'placeholder' => '--Seleccione--',
                                    ]) !!}
                                    @error('adicciones_Tecnoadicciones')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Drogas:') !!}
                                    {!! Form::select('adicciones_Drogas', $adicciones_Drogas, null, [
                                        'class' => 'form-control',
                                        'id' => 'adicciones_Drogas',
                                        'placeholder' => '--Seleccione--',
                                    ]) !!}
                                    @error('adicciones_Drogas')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h2 class="h3">Grupos Sociales y Creencias Religiosas</h2>
                            </div>
            
                         
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Grupos Sociales:') !!}
                                    {!! Form::select('grupo_social', $grupo_social, null, [
                                        'class' => 'form-control',
                                        'id' => 'grupo_social',
                                        'placeholder' => '--Seleccione--',
                                    ]) !!}
                                    @error('grupo_social')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Creencias Religiosas:') !!}
                                    {!! Form::select('creencia_religiosa', $creencia_religiosa, null, [
                                        'class' => 'form-control',
                                        'id' => 'creencia_religiosa',
                                        'placeholder' => '--Seleccione--',
                                    ]) !!}
                                    @error('creencia_religiosa')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h2 class="h3">Medicamentos</h2>
                            </div>
                           
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label(
                                        'name','Consumo de Medicamentos:',
                                    ) !!}
                                    {!! Form::select('tipo_medicamentos', $tipo_medicamentos, null, [
                                        'class' => 'form-control',
                                        'id' => 'tipo_medicamentos',
                                        'placeholder' => '--Seleccione--',
                                    ]) !!}
                                    @error('tipo_medicamentos')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Medicamentos:', ['style'=> 'display: none', 'id' => 'tipo_medicamentos_cons' ]) !!}
                                    {!! Form::textarea('tipo_medicamentos_consumo', null, [
                                        'class' => 'form-control',
                                        'style'=> 'display: none',
                                        'rows' => 1,
                                        'id' => 'tipo_medicamentos_consumo',
                                        'placeholder' => 'Ingrece el medicamento que consume',
                                    ]) !!}
                                    @error('tipo_medicamentos_consumo')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
            
                                    {!! Form::label('name', 'Tipo de problemas:') !!}<br>
                                    <label class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ><input type="checkbox" id="prob_de_personalidad" name="prob_de_personalidad" value = " {{ isset($diagnosticopreventivo->prob_de_personalidad) ? 'checked' : 'unchecked'}}" onClick="p1(event)"> Problemas de personalidad</label>
                                    <label class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ><input type="checkbox" id="prob_de_psiquiatricos" name="prob_de_psiquiatricos" value = "{{$diagnosticopreventivo->prob_de_psiquiatricos}}"onClick="p2(event)"> Problemas psiquiátricos</label>
                                    <label class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ><input type="checkbox" id="prob_de_economicos" name="prob_de_economicos" value = "{{$diagnosticopreventivo->prob_de_economicos}}" onClick="p3(event)"> Problemas económicos</label>
                                    <label class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ><input type="checkbox" id="prob_de_sociales" name="prob_de_sociales" value = "{{$diagnosticopreventivo->prob_de_sociales}}"onClick="p4(event)"> Problemas sociales</label>
                                    <label class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ><input type="checkbox" id="prob_de_familiares" name="prob_de_familiares" value = "{{$diagnosticopreventivo->prob_de_familiares}}"onClick="p5(event)"> Problemas familiares</label>
                                    <label class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ><input type="checkbox" id="prob_de_academicos" name="prob_de_academicos" value = "{{$diagnosticopreventivo->prob_de_academicos}}"onClick="p6(event)"> Problemas académicos</label>
                                    <label class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ><input type="checkbox" id="prob_de_disciplina" name="prob_de_disciplina" value = "{{$diagnosticopreventivo->prob_de_disciplina}}"onClick="p7(event)"> Problemas  de disciplina</label>
                                    <label class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ><input type="checkbox" id="prob_de_asistencia" name="prob_de_asistencia" value = "{{$diagnosticopreventivo->prob_de_asistencia}}"onClick="p8(event)"> Problemas de asistencia</label>
                                </div>
                           
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Descripcion del problema de personalidad:', [ 'id' => 'label_desc_prob_de_personalidad']) !!}
                                    {!! Form::textarea('desc_prob_de_personalidad', null, [
                                        'class' => 'form-control',
                                        
                                        'rows' => 1,
                                        'id' => 'desc_prob_de_personalidad',
                                        'placeholder' => 'Ingrese el problema',
                                    ]) !!}
                                    @error('desc_prob_de_personalidad')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Descripcion del problema psiquiátrico:', [ 'id' => 'label_desc_prob_de_psiquiatricos'  ]) !!}
                                    {!! Form::textarea('desc_prob_de_psiquiatricos', null, [
                                        'class' => 'form-control',
                                        
                                        'rows' => 1,
                                        'id' => 'desc_prob_de_psiquiatricos',
                                        'placeholder' => 'Ingrese el problema',
                                    ]) !!}
                                    @error('desc_prob_de_psiquiatricos')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Descripcion del problema económico:', [ 'id' => 'label_desc_prob_de_economicos'  ]) !!}
                                    {!! Form::textarea('desc_prob_de_economicos', null, [
                                        'class' => 'form-control',
                                        
                                        'rows' => 1,
                                        'id' => 'desc_prob_de_economicos',
                                        'placeholder' => 'Ingrese el problema',
                                    ]) !!}
                                    @error('desc_prob_de_economicos')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Descripcion del problema social:', [ 'id' => 'label_desc_prob_de_sociales' ]) !!}
                                    {!! Form::textarea('desc_prob_de_sociales', null, [
                                        'class' => 'form-control',
                                        
                                        'rows' => 1,
                                        'id' => 'desc_prob_de_sociales',
                                        'placeholder' => 'Ingrese el problema',
                                    ]) !!}
                                    @error('desc_prob_de_sociales')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Descripcion del problema familiar:', [ 'id' => 'label_desc_prob_de_familiares' ]) !!}
                                    {!! Form::textarea('desc_prob_de_familiares', null, [
                                        'class' => 'form-control',
                                        
                                        'rows' => 1,
                                        'id' => 'desc_prob_de_familiares',
                                        'placeholder' => 'Ingrese el problema',
                                    ]) !!}
                                    @error('desc_prob_de_familiares')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Descripcion del problema académico:', [ 'id' => 'label_desc_prob_de_academicos'  ]) !!}
                                    {!! Form::textarea('desc_prob_de_academicos', null, [
                                        'class' => 'form-control',
                                        
                                        'rows' => 1,
                                        'id' => 'desc_prob_de_academicos',
                                        'placeholder' => 'Ingrese el problema',
                                    ]) !!}
                                    @error('desc_prob_de_academicos')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Descripcion del problema de disciplina:', [ 'id' => 'label_desc_prob_de_disciplina'  ]) !!}
                                    {!! Form::textarea('desc_prob_de_disciplina', null, [
                                        'class' => 'form-control',
                                        
                                        'rows' => 1,
                                        'id' => 'desc_prob_de_disciplina',
                                        'placeholder' => 'Ingrese el problema',
                                    ]) !!}
                                    @error('desc_prob_de_disciplina')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Descripcion del problema de asistencia:', [ 'id' => 'label_desc_prob_de_asistencia'  ]) !!}
                                    {!! Form::textarea('desc_prob_de_asistencia', null, [
                                        'class' => 'form-control',
                                        
                                        'rows' => 1,
                                        'id' => 'desc_prob_de_asistencia',
                                        'placeholder' => 'Ingrese el problema',
                                    ]) !!}
                                    @error('desc_prob_de_asistencia')
                                        <strong class="error-message text-danger"> {{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>
            
                        </div>
                    </fieldset>
            
                </div>
            </div>
            <a href="{{ route('estudiantes.index', $diagnosticopreventivo->users->id) }}"
                class="btn btn-danger">Cancelar</a>
            {!! Form::submit('Editar Diagnostico preventivo', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</form>

@stop
@section('js')
<script src="{{ asset('js/diagnosticopreventino.js') }}"></script>
@endsection
