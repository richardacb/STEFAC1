@extends('adminlte::page')

@section('template_title')
    Modificar Reporte
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Modificar Reporte</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reportes.update', $reporte->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Modulo_GECE.reportes.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection