@extends('layouts.app')
{{--  @extends('adminlte::page')  --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="primer_nombre" class="col-md-4 col-form-label text-md-end">{{ __('Primer Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="primer_nombre" type="text" class="form-control @error('primer_nombre') is-invalid @enderror" name="primer_nombre" value="{{ old('primer_nombre') }}" required autocomplete="primer_nombre" autofocus>

                                @error('primer_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="segundo_nombre" class="col-md-4 col-form-label text-md-end">{{ __('Segundo Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="segundo_nombre" type="text" class="form-control @error('segundo_nombre') is-invalid @enderror" name="segundo_nombre" value="{{ old('segundo_nombre') }}" required autocomplete="segundo_nombre" autofocus>

                                @error('segundo_nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="primer_apellido" class="col-md-4 col-form-label text-md-end">{{ __('Primer Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="primer_apellido" type="text" class="form-control @error('primer_apellido') is-invalid @enderror" name="primer_apellido" value="{{ old('primer_apellido') }}" required autocomplete="primer_apellido" autofocus>

                                @error('primer_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="segundo_apellido" class="col-md-4 col-form-label text-md-end">{{ __('Segundo Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="segundo_apellido" type="text" class="form-control @error('segundo_apellido') is-invalid @enderror" name="segundo_apellido" value="{{ old('segundo_apellido') }}" required autocomplete="segundo_apellido" autofocus>

                                @error('segundo_apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ci" class="col-md-4 col-form-label text-md-end">{{ __('Carnet de identidad') }}</label>

                            <div class="col-md-6">
                                <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}" required autocomplete="ci" autofocus>

                                @error('ci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo_de_usuario" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de Usuario') }}</label>

                            <div class="col-md-6">
                                <select name="tipo_de_usuario" id="tipo_de_usuario" class="form-control mr-sm-2 form-select form-control @error('tipo_de_usuario') is-invalid @enderror" value="{{ old('tipo_de_usuario') }}" required autofocus>
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
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Direccion de correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sexo" class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                <select name="sexo" id="sexo" class="form-control mr-sm-2 form-select form-control @error('sexo') is-invalid @enderror" value="{{ old('sexo') }}" required autofocus>
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
                        </div>

                        <div class="row mb-3">
                            <label for="municipio" class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>

                            <div class="col-md-6">
                                <input id="municipio" type="text" class="form-control @error('municipio') is-invalid @enderror" name="municipio" value="{{ old('municipio') }}" required autocomplete="municipio" autofocus>

                                @error('municipio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="provincia" class="col-md-4 col-form-label text-md-end">{{ __('Provincia') }}</label>

                            <div class="col-md-6">
                                <input id="provincia" type="text" class="form-control @error('provincia') is-invalid @enderror" name="provincia" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="color_piel" class="col-md-4 col-form-label text-md-end">{{ __('Color de piel') }}</label>

                            <div class="col-md-6">
                                <select name="color_piel" id="color_piel" class="form-control mr-sm-2 form-select form-control @error('sexo') is-invalid @enderror" value="{{ old('color_piel') }}" required autofocus>
                                    <option value="0" selected="selected">--Seleccione--</option>
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
                        </div>

                        <div class="row mb-3">
                            <label for="telefono_casa" class="col-md-4 col-form-label text-md-end">{{ __('Telefono de Casa') }}</label>

                            <div class="col-md-6">
                                <input id="telefono_casa" type="text" class="form-control @error('telefono_casa') is-invalid @enderror" name="telefono_casa" value="{{ old('telefono_casa') }}" required autocomplete="username" autofocus>

                                @error('telefono_casa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono_uci" class="col-md-4 col-form-label text-md-end">{{ __('Telefono Uci') }}</label>

                            <div class="col-md-6">
                                <input id="telefono_uci" type="text" class="form-control @error('telefono_uci') is-invalid @enderror" name="telefono_uci" value="{{ old('telefono_uci') }}"  autocomplete="telefono_uci" autofocus>

                                @error('telefono_uci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="celular" class="col-md-4 col-form-label text-md-end">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}"  autocomplete="celular" autofocus>

                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="solapin" class="col-md-4 col-form-label text-md-end">{{ __('Solapin') }}</label>

                            <div class="col-md-6">
                                <input id="solapin" type="text" class="form-control @error('solapin') is-invalid @enderror" name="solapin" value="{{ old('solapin') }}"  autocomplete="solapin" autofocus>

                                @error('solapin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
