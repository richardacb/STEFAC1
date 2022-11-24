@extends('adminlte::page')

@section('template_title')
    Modificar Tribunal de Predefensa y Defensa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Modificar Tribunal de Predefensa y Defensa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tribunalpd.index') }}"> Volver</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tribunalpd.update', $tribunalpd->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Modulo_GECE.tribunalpd.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection