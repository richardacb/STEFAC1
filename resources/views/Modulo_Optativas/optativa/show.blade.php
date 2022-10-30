@extends('adminlte::page')

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection
    <a href="{{ route('optativa.index') }}" class="btn btn-secondary my-2">ir atras</a>
    <div class="text-center py-5">
        <span>Optativa: {{ $optativa->nombre }}</span> <br>
        <span>Matrícula: {{ $cant_est }}/{{ $optativa->capacidad }}</span> <br>
    </div>
    <div class="d-flex flex-row justify-content-between vh-100">
        <div class="d-flex flex-column justify-content-start text-center mx-2 w-50 overflow-auto">
            <span class="py-2">Estudiantes Matriculados</span>

            <table class="table table-light table-striped mt-4" id="um">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Estudiante</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Año</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($usuarios_matriculados as $usuario_matriculado)
                        <tr>
                            <td>{{ $usuario_matriculado->nombre_est }}</td>
                            <td>{{ $usuario_matriculado->grupo }}</td>
                            <td>{{ $usuario_matriculado->anno }}</td>
                            <td>
                                <div class="d-flex flex-row justify-content-between align-items-center py-2 px-2">
                                    <div class="d-flex flex-row ">
                                        <form class="mx-2"
                                            action="{{ route('opt_est.destroy', $optativa->id . '+' . $usuario_matriculado->id . '+' . 'show') }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                class="fa fa-times"></i></button>
                                        </form>
                                        <a href="{{ route('usuarios.show', $usuario_matriculado->id) }}"
                                            class="btn btn-warning"><i
                                            class="fa fa-user"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex flex-column justify-content-start text-center mx-2 w-50 overflow-auto">
            <span class="py-2">Estudiantes No Matriculados</span>

            <table class="table table-light table-striped mt-4" id="unm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Estudiante</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Año</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($usuarios_no_matriculados as $usuario_no_matriculado)
                        <tr>
                            <td>{{ $usuario_no_matriculado->nombre_est }}</td>
                            <td>{{ $usuario_no_matriculado->grupo }}</td>
                            <td>{{ $usuario_no_matriculado->anno }}</td>
                            <td>
                                <div class="d-flex flex-row justify-content-between align-items-center py-2 px-2">
                                    <div class="d-flex flex-row ">
                                        <form class="mx-2"
                                            action="{{ route('opt_est.store', ['id_opt' => $optativa->id, 'id_est' => $usuario_no_matriculado->id, 'show' => 'show']) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-info"><i
                                                class="fa fa-check"></i></button>
                                        </form>
                                        <a href="{{ route('usuarios.show', $usuario_no_matriculado->id) }}"
                                            class="btn btn-warning"><i
                                            class="fa fa-user"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#um').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
    $(document).ready(function() {
        $('#unm').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
@endsection
