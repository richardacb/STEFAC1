@extends('adminlte::page')

@section('template_title')
    Deposito de Documentos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Depósito de Documentos') }}
                            </span>

                            <div class="float-right btn-group">
                                <a class="btn btn-primary btn-sm float-right" href="{{ route('deposito.create') }}" data-placement="left">
                                  {{ __('Insertar Depósito') }}
                                </a>
                            </div>

                        </div>
                    </div>
                    
                    <div class="card-body">
                        

                        {!! Form::open(['route' => ['documento.store'], 'files' => true]) !!}

                            {!! Form::file('documentos[]', ['multiple' => 'multiple']) !!}

                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-sm']) !!}
                        
                        {!! Form::close() !!}
                    </div>
                </div>
                
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Documentos</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" >
                            @foreach ($deposito->id as $deposito)
                                <tr>
                                    <td>
                                        <a href="{{ route('documento.descargar', $documento->id) }}">
                                            {{ $documento->nombre }}
                                        </a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection