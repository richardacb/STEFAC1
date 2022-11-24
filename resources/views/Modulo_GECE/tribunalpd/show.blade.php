@extends('adminlte::page')

@section('template_title')
    {{ $tribunalpd->name ?? 'Mostrar Tribunal de Predefensa y Defensa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información del Tribunal de Predefensa y Defensa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tribunalpd.index') }}">Volver</a>
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
                                            <th scope="col">Nombre del Tribunal Predefensa y Defensa</th>
                                            <td>{{$tribunalpd->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <td> {{$tribunalpd->est1}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tesista:</th>
                                            <td>{{$tribunalpd->est2}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tutor:</th>
                                            <td>{{$tribunalpd->prof1}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tutor:</th>
                                            <td>{{$tribunalpd->prof2}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Secretario:</th>
                                            <td>{{$tribunalpd->sec}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Presidente:</th>
                                            <td>{{$tribunalpd->pre}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Presidente:</th>
                                            <td>{{$tribunalpd->miem}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Oponente:</th>
                                            <td>{{$tribunalpd->op}}</td>
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