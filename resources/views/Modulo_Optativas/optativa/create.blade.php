@extends('adminlte::page')

@section('content')
    <h1>Insertar Optativa</h1>
    <form action="{{ route('optativa.store') }}" method="POST" id="create_opt">
        @csrf
        <div class="mt-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
            @error('nombre')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
        </div>
        <div class="mt-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" cols="10" class="form-control">
            </textarea>
            @error('descripcion')
                <strong class="error-message text-danger"> {{ $message }} </strong>
            @enderror
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-row w-100">
                <div class="mt-3 w-50 mx-1">
                    <label for="id_prof_1">Profesor Principal</label>
                    <select class="form-control" name="prof_principal" id="prof_principal">
                        <option value="">- Seleccione Profesor Principal -</option>
                        @foreach ($profesores as $profesor)
                            <option value="{{ $profesor->id }}">{{ $profesor->prof_nombre }}</option>
                        @endforeach
                    </select>
                    @error('prof_principal')
                        <strong class="error-message text-danger"> {{ 'Campo Requerido' }} </strong>
                    @enderror
                </div>
                <div class="mt-3 w-50 mx-1">
                    <label for="id_prof_2">Profesor Auxiliar</label>
                    <select class="form-control" name="prof_auxiliar" id="prof_auxiliar">
                        <option value="">- Seleccione Profesor Auxiliar -</option>
                        @foreach ($profesores as $profesor)
                            <option value="{{ $profesor->id }}">{{ $profesor->prof_nombre }}</option>
                        @endforeach
                    </select>
                    @error('prof_auxiliar')
                        <strong class="error-message text-danger"> {{ 'Campo Requerido' }} </strong>
                    @enderror
                </div>
            </div>
            <div class="py-2"><strong class="error-message text-danger" id="err_prof"></strong></div>
        </div>
        <div class="d-flex flex-row">
            <div class="mt-3 w-25 mx-1">
                <label class="form-label">Capacidad</label>
                <input type="number" name="capacidad" id="capacidad" class="form-control">
                @error('capacidad')
                    <strong class="error-message text-danger"> {{ $message }} </strong>
                @enderror
            </div>
            <div class="mt-3 w-25 mx-1">
                <label class="form-label">Año Académico</label>
                @role('Vicedecana')
                    <input type="number" class="form-control" id="anno_academico" name="anno_academico" value=""
                        min="1" max="5" placeholder="Ingrese el número de su año docente">
                    @error('anno_academico')
                        <strong class="error-message text-danger"> {{ $message }} </strong>
                    @enderror
                @else
                    <input type="number" name="anno_academico" id="anno_academico" value="{{ $anno }}"
                        min="{{ $anno }}" max="{{ $anno }}" class="form-control" readonly>
                @endrole

            </div>
            <div class="mt-3 w-25 mx-1">
                <label class="form-label">Semestre</label>
                @role('Vicedecana')
                    <input type="number" name="semestre" id="semestre" class="form-control" min="1" max="10">
                    @error('semestre')
                        <strong class="error-message text-danger"> {{ $message }} </strong>
                    @enderror
                @else
                    <input type="number" name="semestre" id="semestre" class="form-control" min="{{ $anno + ($anno - 1) }}"
                        max="{{ $anno * 2 }}">
                @endrole

            </div>
            <div class="mt-3 w-25 mx-1">
                <label class="form-label">Estado</label>
                <select class="form-control" name="estado" id="estado">
                    <option value="" selected="selected">Seleccione el Estado</option>
                    <option value="1">Activa</option>
                    <option value="0">Inactiva</option>
                </select>
                @error('estado')
                    <strong class="error-message text-danger"> {{ 'Campo Requerido' }} </strong>
                @enderror
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('optativa.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection
@section('js')
    <script src="{{ asset('js/create.opt.js') }}"></script>
@endsection
