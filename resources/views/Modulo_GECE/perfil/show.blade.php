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
                            <span class="card-title">Información del Perfil de Trabajo de Diploma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('perfil.index') }}">Volver</a>
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
                                            <th scope="col">Nombre del Perfil</th>
                                            <td>{{$perfil->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <td> {{$perfil->est1}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <td>{{$perfil->est2}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tutor:</th>
                                            <td>{{$perfil->prof1}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tutor:</th>
                                            <td>{{$perfil->prof2}}</td>
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