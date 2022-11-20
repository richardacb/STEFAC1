@extends('adminlte::page')

@section('template_title')
    Modificar Comite
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Modificar Comite</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('comite.update', $comite->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Modulo_GECE.comite.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection