@extends('adminlte::page')

@section('template_title')
    {{ $tribunaltaller->name ?? 'Mostrar Tribunal Taller' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información del Tribunal Taller de Trabajo de Diploma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tribunaltaller.index') }}">Volver</a>
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
                                            <th scope="col">Nombre del Tribunal Taller</th>
                                            <td>{{$tribunaltaller->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <td> {{$tribunaltaller->est1}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <td>{{$tribunaltaller->est2}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tutor:</th>
                                            <td>{{$tribunaltaller->prof1}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tutor:</th>
                                            <td>{{$tribunaltaller->prof2}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Secretario:</th>
                                            <td>{{$tribunaltaller->sec}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Presidente:</th>
                                            <td>{{$tribunaltaller->pre}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Presidente:</th>
                                            <td>{{$tribunaltaller->miem}}</td>
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