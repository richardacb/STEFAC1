@extends('adminlte::page')

@section('template_title')
    Nuevo Tribunal de Predefensa y Defensa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Tribunal de Predefensa y Defensa</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tribunalpd.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('Modulo_GECE.tribunalpd.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
