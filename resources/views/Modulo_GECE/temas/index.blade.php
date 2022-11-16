@extends('adminlte::page')

@section('template_title')
    Tema
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Temas de Trabajo de Diploma') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('temas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Insertar Tema') }}
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
                                    @foreach ($tema as $tema)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tema->nombre }}</td>

                                            

                                            <td>
                                                <form action="{{ route('temas.destroy',$tema->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('temas.show',$tema->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('temas.edit',$tema->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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