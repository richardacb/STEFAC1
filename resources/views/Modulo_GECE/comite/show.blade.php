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
                            <span class="card-title">Información del Comité de Trabajo de Diploma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comite.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                
                            </div>
                            <div class="col-sm-8">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th scope="col">Nombre del Comité</th>
                                            <th scope="col">{{$comite->nombre}}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <th scope="col"> {{$comite->est1}}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <th scope="col">{{$comite->est2}}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tutor:</th>
                                            <th scope="col">{{$comite->prof}}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Secretario:</th>
                                            <th scope="col">{{$comite->sec}}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Presidente:</th>
                                            <th scope="col">{{$comite->pre}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-2">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
