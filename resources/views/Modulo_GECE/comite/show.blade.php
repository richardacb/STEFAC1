@extends('adminlte::page')

@section('template_title')
    {{ $comite->name ?? 'Mostrar Comite' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Comite</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comite.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $comite->nombre }}
                        </div>

                        
                        <div class="form-group">
                            <strong>Tesista:</strong>
                            {{$comite->est1}}
                        </div>
                       
                       
                        <div class="form-group">
                            <strong>Tesista:</strong>
                            {{$comite->est2}}
                        </div>

                        <div class="form-group">
                            <strong>Tutor:</strong>
                            {{ $comite->prof}}
                        </div>

                        <div class="form-group">
                            <strong>Secretario:</strong>
                            {{ $comite->sec}}
                        </div>

                        <div class="form-group">
                            <strong>Presidente:</strong>
                            {{ $comite->pre}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
