@extends('adminlte::page')

@section('template_title')
    Nuevo Tribunal Taller
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Nuevo Tribunal Taller de Trabajo de Diploma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comite.index') }}"> Volver</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tribunaltaller.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('Modulo_GECE.tribunaltaller.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
