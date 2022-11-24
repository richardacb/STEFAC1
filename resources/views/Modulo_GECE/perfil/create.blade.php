@extends('adminlte::page')

@section('template_title')
    Nuevo Perfil
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Nuevo Perfil</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('perfil.index') }}"> Volver</a>
                        </div>   
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('perfil.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('Modulo_GECE.perfil.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
