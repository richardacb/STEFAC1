@extends('adminlte::page')

@section('content')
    <h1>Editar Optativa</h1>
    <form action="{{ route('optativa.update', $optativa->id) }}" method="POST" id="edit_opt">
        @csrf
        @method('PUT')
        <div class="mt-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $optativa->nombre }}">
        </div>
        <div class="mt-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" cols="10" class="form-control">
                {{ $optativa->descripcion }}
            </textarea>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-row w-100">
                <div class="mt-3 w-50 mx-1">
                    <label for="id_prof_1">Profesor Principal</label>
                    <select class="form-control" name="prof_principal" id="prof_principal">
                        @if (!$optativa->prof_principal)
                            <option value="">- Seleccione Profesor Principal -</option>
                            @foreach ($profesores as $profesor)
                                @if ($profesor->id !== $optativa->prof_principal)
                                    <option value="{{ $profesor->id }}">{{ $profesor->prof_nombre }}</option>
                                @endif
                            @endforeach
                        @endif
                        @if ($optativa->prof_principal)
                            @foreach ($profesores as $profesor)
                                @if ($profesor->id === $optativa->prof_principal)
                                    <option value="{{ $optativa->prof_principal }}">{{ $profesor->prof_nombre }}</option>
                                @endif
                            @endforeach
                            @foreach ($profesores as $profesor)
                                @if ($profesor->id !== $optativa->prof_principal)
                                    <option value="{{ $profesor->id }}">{{ $profesor->prof_nombre }}</option>
                                @endif
                            @endforeach
                            <option value="">- Seleccione Profesor Principal -</option>
                        @endif
                    </select>
                </div>
                <div class="mt-3 w-50 mx-1">
                    <label for="id_prof_2">Profesor Auxiliar</label>
                    <select class="form-control" name="prof_auxiliar" id="prof_auxiliar">
                        @if (!$optativa->prof_auxiliar)
                            <option value="">- Seleccione Profesor Auxiliar -</option>
                            @foreach ($profesores as $profesor)
                                @if ($profesor->id !== $optativa->prof_auxiliar)
                                    <option value="{{ $profesor->id }}">{{ $profesor->prof_nombre }}</option>
                                @endif
                            @endforeach
                        @endif
                        @if ($optativa->prof_auxiliar)
                            @foreach ($profesores as $profesor)
                                @if ($profesor->id === $optativa->prof_auxiliar)
                                    <option value="{{ $optativa->prof_auxiliar }}">{{ $profesor->prof_nombre }}</option>
                                @endif
                            @endforeach
                            @foreach ($profesores as $profesor)
                                @if ($profesor->id !== $optativa->prof_auxiliar)
                                    <option value="{{ $profesor->id }}">{{ $profesor->prof_nombre }}</option>
                                @endif
                            @endforeach
                            <option value="">- Seleccione Profesor Auxiliar -</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="py-2"><strong class="error-message text-danger" id="err_prof"></strong></div>
        </div>
        <div class="d-flex flex-row">
            <div class="mt-3 w-25 mx-1">
                <label class="form-label">Capacidad</label>
                <input type="number" name="capacidad" id="capacidad" class="form-control"
                    value="{{ $optativa->capacidad }}">
            </div>
            <div class="mt-3 w-25 mx-1">
                <label class="form-label">Año Académico</label>

                @role('Vicedecana')
                    <input type="number" name="anno_academico" class="form-control" value="{{ $optativa->anno_academico }}"
                        id="anno" name="anno" value="" min="1" max="5">
                @else
                    <input type="number" name="anno_academico" id="anno_academico" class="form-control"
                        value="{{ $optativa->anno_academico }}" min="{{ $optativa->anno_academico }}"
                        max="{{ $optativa->anno_academico }}" readonly>
                @endrole

            </div>
            <div class="mt-3 w-25 mx-1">
                <label class="form-label">Semestre</label>
                @role('Vicedecana')
                    <input type="number" name="semestre" id="semestre" class="form-control" min="1" max="10"
                        value="{{ $optativa->semestre }}">
                @else
                    <input type="number" name="semestre" id="semestre" class="form-control"
                        min="{{ $optativa->anno_academico + ($optativa->anno_academico - 1) }}"
                        max="{{ $optativa->anno_academico * 2 }}" value="{{ $optativa->semestre }}">
                @endrole
            </div>
            <div class="mt-3 w-25 mx-1">
                <label class="form-label">Estado</label>
                <select class="form-control" name="estado" id="estado">
                    @if ($optativa->estado === 1)
                        <option value="{{ $optativa->estado }}">Activa</option>
                        <option value="0">Inactiva</option>
                    @endif
                    @if ($optativa->estado === 0)
                        <option value="{{ $optativa->estado }}">Inactiva</option>
                        <option value="1">Activa</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('optativa.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection
@section('js')
    <script src="{{ asset('js/edit.opt.js') }}"></script>
@endsection
