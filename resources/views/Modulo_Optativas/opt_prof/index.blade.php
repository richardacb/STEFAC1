@extends('adminlte::page')

@section('content_header')
    <div class="text-center py-5">
        <span>Optativa: {{ $opt->nombre }}</span> <br>
        <span>Matrícula: {{ $cant_est }}/{{ $opt->capacidad }}</span> <br>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <table class="table table-light table-striped mt-4" id="opt_prof">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Estudiantes</th>
                <th scope="col">Grupo</th>
                <th scope="col">Año</th>
                <th scope="col">Nota</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($est_matriculados as $est_matriculado)
                <tr>
                    <td>{{ $est_matriculado->nombre_est }}</td>
                    <td>{{ $est_matriculado->grupo }}</td>
                    <td>{{ $est_matriculado->anno }}</td>
                    <td class="w-25">
                        <div id="{{ $est_matriculado->id_est_opt }}">
                            <input type="number" id="nota" min="1" max="5"
                                class="form-control mx-2 w-25" value="{{ $est_matriculado->nota }}" disabled>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/opt_prof.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#opt_prof').DataTable({
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
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    @if (session('info') == 'eliminar-optativa')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Datos eliminados.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-optativa')
        <script>
            Swal.fire(
                '¡Insertada!',
                'Optativa Insertada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-optativa_prof')
        <script>
            Swal.fire(
                '¡Evaluado!',
                'Nota Evaluada.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'importar-optativa')
        <script>
            Swal.fire(
                'Insertada!',
                'Optativa Insertada con Éxito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.eliminar-optativa').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Está seguro que desea eliminar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
