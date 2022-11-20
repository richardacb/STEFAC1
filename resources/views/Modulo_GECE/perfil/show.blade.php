@extends('adminlte::page')

@section('template_title')
    {{ $perfil->nombre ?? 'Mostrar Perfil' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Perfil</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('perfil.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $perfil->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection