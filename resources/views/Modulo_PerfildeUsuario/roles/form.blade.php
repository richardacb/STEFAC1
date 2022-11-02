<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Ingrese el nombre del rol']) !!}
                    @error('name')
                        <strong class="error-message text-danger"> {{ $message }} </strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2 class="h3">Listado de permisos</h2>
            </div>
            @foreach ($permissions as $permission)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <label>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                        {{ $permission->description }}
                    </label>
                </div>
            @endforeach







        </div>
    </div>
</div>
