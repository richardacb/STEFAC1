@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1>Cambiar Contraseña</h1>
@stop

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cambiar Contraseña') }}</div>

                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Actual</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Contraseña Actual">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Nueva</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="Contraseña Nueva">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirmar</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirmar Nueva Contraseña">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Cambiar</button>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    @if (session('error') == 'no')
<script>
    Swal.fire(
        'Atencion!',
        'Las contraseñas no coinciden.',
        'success'
    )
</script>
@endif
@if (session('status') == 'si')
<script>
    Swal.fire(
        'Cambiada!',
        'La contraseña a sido cambiada con exito.',
        'success'
    )
</script>
@endif
@endsection
