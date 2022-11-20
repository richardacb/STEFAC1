@extends('adminlte::page')

@section('template_title')
    Tribunal de Predefensa y Defensa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tribunal de Predefensa y Defensa de Trabajo de Diploma') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tribunalpd.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Insertar Tribunal') }}
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
                                        <th>No.</th>
                                        
										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tribunalpd as $tribunalpd)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tribunalpd->nombre }}</td>

                                            

                                            <td>
                                                <form action="{{ route('tribunalpd.destroy',$tribunalpd->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tribunalpd.show',$tribunalpd->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tribunalpd.edit',$tribunalpd->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection