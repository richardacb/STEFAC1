@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Registrar Usuario</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

<div class="card">

    <div class="card-body">
        <form method="POST" action="{{ route('usuarios.store') }}">
            @csrf
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="primer_nombre"
                            class="col-md-4 col-form-label text-md-end">{{ __('Primer Nombre') }}</label>

                        <input id="primer_nombre" type="text"
                            class="form-control @error('primer_nombre') is-invalid @enderror" name="primer_nombre"
                            value="{{ old('primer_nombre') }}" autocomplete="primer_nombre" autofocus>

                        @error('primer_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="segundo_nombre"
                            class="col-md-4 col-form-label text-md-end">{{ __('Segundo Nombre') }}</label>


                        <input id="segundo_nombre" type="text"
                            class="form-control @error('segundo_nombre') is-invalid @enderror" name="segundo_nombre"
                            value="{{ old('segundo_nombre') }}" autocomplete="segundo_nombre" autofocus>

                        @error('segundo_nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="primer_apellido"
                            class="col-md-4 col-form-label text-md-end">{{ __('Primer Apellido') }}</label>


                        <input id="primer_apellido" type="text"
                            class="form-control @error('primer_apellido') is-invalid @enderror" name="primer_apellido"
                            value="{{ old('primer_apellido') }}" autocomplete="primer_apellido" autofocus>

                        @error('primer_apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="segundo_apellido"
                            class="col-md-4 col-form-label text-md-end">{{ __('Segundo Apellido') }}</label>


                        <input id="segundo_apellido" type="text"
                            class="form-control @error('segundo_apellido') is-invalid @enderror" name="segundo_apellido"
                            value="{{ old('segundo_apellido') }}" autocomplete="segundo_apellido" autofocus>

                        @error('segundo_apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="ci"
                            class="col-md-4 col-form-label text-md-end">{{ __('Carnet de identidad') }}</label>


                        <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror"
                            name="ci" value="{{ old('ci') }}" autocomplete="ci" autofocus>

                        @error('ci')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="tipo_de_usuario"
                            class="col-md-4 col-form-label text-md-end">{{ __('Tipo de Usuario') }}</label>


                        <select name="tipo_de_usuario" id="tipo_de_usuario"
                            class="form-control mr-sm-2 form-select form-control @error('tipo_de_usuario') is-invalid @enderror"
                            value="{{ old('tipo_de_usuario') }}" autofocus>
                            <option value="0" selected="selected">--Seleccione--</option>
                            <option value="Estudiante"> Estudiante </option>
                            <option value="Profesor"> Profesor </option>
                        </select>
                        @error('tipo_de_usuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Usuario') }}</label>


                        <input id="username" type="text"
                            class="form-control @error('username') is-invalid @enderror" name="username"
                            value="{{ old('username') }}" autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-end">{{ __('Direccion de correo') }}</label>


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" autocomplete="new-password">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="sexo" class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>


                        <select name="sexo" id="sexo"
                            class="form-control mr-sm-2 form-select form-control @error('sexo') is-invalid @enderror"
                            value="{{ old('sexo') }}" autofocus>
                            <option value="0" selected="selected">--Seleccione--</option>
                            <option value="Masculino"> Masculino </option>
                            <option value="Femenino"> Femenino </option>
                        </select>
                        @error('sexo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="municipio"
                            class="col-md-4 col-form-label text-md-end">{{ __('Año') }}</label>


                        <input id="anno" type="number" min="1" max="5"
                            class="form-control @error('anno') is-invalid @enderror" name="anno"
                            value="{{ old('anno') }}" autocomplete="anno" autofocus>

                        @error('anno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="municipio"
                            class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>


                        <input id="municipio" type="text"
                            class="form-control @error('municipio') is-invalid @enderror" name="municipio"
                            value="{{ old('municipio') }}" autocomplete="municipio" autofocus>

                        @error('municipio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="provincia"
                            class="col-md-4 col-form-label text-md-end">{{ __('Provincia') }}</label>


                        <input id="provincia" type="text"
                            class="form-control @error('provincia') is-invalid @enderror" name="provincia"
                            value="{{ old('username') }}" autocomplete="username" autofocus>

                        @error('provincia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="color_piel"
                            class="col-md-4 col-form-label text-md-end">{{ __('Color de piel') }}</label>


                        <select name="color_piel" id="color_piel"
                            class="form-control mr-sm-2 form-select form-control @error('sexo') is-invalid @enderror"
                            value="{{ old('color_piel') }}" autofocus>
                            <option value="" selected="selected">--Seleccione--</option>
                            <option value="Blanca"> Blanca </option>
                            <option value="India"> India </option>
                            <option value="Mestiza"> Mestiza </option>
                            <option value="Negra"> Negra </option>
                        </select>
                        @error('color_piel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="telefono_casa"
                            class="col-md-4 col-form-label text-md-end">{{ __('Telefono de Casa') }}</label>


                        <input id="telefono_casa" type="text"
                            class="form-control @error('telefono_casa') is-invalid @enderror" name="telefono_casa"
                            value="{{ old('telefono_casa') }}" autocomplete="username" autofocus>

                        @error('telefono_casa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="telefono_uci"
                            class="col-md-4 col-form-label text-md-end">{{ __('Telefono Uci') }}</label>


                        <input id="telefono_uci" type="text"
                            class="form-control @error('telefono_uci') is-invalid @enderror" name="telefono_uci"
                            value="{{ old('telefono_uci') }}" autocomplete="telefono_uci" autofocus>

                        @error('telefono_uci')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="celular" class="col-md-4 col-form-label text-md-end">{{ __('Celular') }}</label>


                        <input id="celular" type="text"
                            class="form-control @error('celular') is-invalid @enderror" name="celular"
                            value="{{ old('celular') }}" autocomplete="celular" autofocus>

                        @error('celular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="solapin" class="col-md-4 col-form-label text-md-end">{{ __('Solapin') }}</label>


                        <input id="solapin" type="text"
                            class="form-control @error('solapin') is-invalid @enderror" name="solapin"
                            value="{{ old('solapin') }}" autocomplete="solapin" autofocus>

                        @error('solapin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="col-md-12 col-sm-12 mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrar Usuario') }}
                        </button>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>

                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@stop

@section('js')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#usuarios_id').DataTable({
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ Registros por Página",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "first": "Primero",
                    "last": "Último",
                }
            }
        });
    });
</script>
@endsection
