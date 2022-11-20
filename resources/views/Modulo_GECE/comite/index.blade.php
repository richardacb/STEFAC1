@extends('adminlte::page')

@section('template_title')
    Comité
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Comité de Trabajo de Diploma') }}
                            </span>

                             <div class="float-right btn-group" role="group">
                                <a class="btn btn-primary btn-sm float-right" href="{{ route('comite.create') }}"   data-placement="left">
                                  {{ __('Insertar Comité') }}
                                  
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comites as $comite)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $comite->nombre }}</td>
                                            
                                            <td>
                                                <form action="{{ route('comite.destroy',$comite->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('comite.show',$comite->id) }}"><i class="fa fa-fw fa-eye"></i>Mostrar </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('comite.edit',$comite->id) }}"><i class="fa fa-fw fa-edit"></i>Editar </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Borrar </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $comites->links() !!}
            </div>
        </div>
    </div>
@endsection
