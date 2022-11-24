@extends('adminlte::page')

@section('template_title')
    {{ $tema->name ?? 'Mostrar Tema' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información Tema de Trabajo de Diploma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('temas.index') }}">Volver</a>
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
                                            <th scope="col">Nombre del Tema</th>
                                            <td>{{$tema->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <td> {{$tema->est1}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <td>{{$tema->est2}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tutor:</th>
                                            <td>{{$tema->prof1}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tutor:</th>
                                            <td>{{$tema->prof2}}</td>
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