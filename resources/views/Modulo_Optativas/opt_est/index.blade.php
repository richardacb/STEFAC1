@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <h1>Optativas Ofertadas</h1>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
    <table class="table table-light table-striped mt-4" id="opt_estudiante">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Optativa</th>
                <th scope="col">Profesores</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach (json_decode($infs) as $inf)
                <tr>
                    <td>{{ $inf->opt }}</td>
                    <td>
                        @if ($inf->prof_1 && $inf->prof_2)
                            {{ $inf->prof_1 }} <br> {{ $inf->prof_2 }}
                        @endif
                        @if (!$inf->prof_1 || !$inf->prof_2)
                            {{ $inf->prof_1 }} {{ $inf->prof_2 }}
                        @endif
                    </td>
                    <td>
                        @if (!in_array($inf->id_opt, $id_opts) && count($id_opts) < 2 && $inf->disp == 'si')
                            <form action="{{ route('opt_est.store', ['id_opt' => $inf->id_opt, 'id_est' => $inf->id_est]) }}"
                                method="POST">
                                @csrf
                                {{--  @can('Modulo_Optativas.opt_est.store')  --}}
                                <button type="submit" class="btn btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Matricular"><i class="fa fa-check"></i></button>
                                {{--  @endcan  --}}
                            </form>
                        @endif
                        @if (in_array($inf->id_opt, $id_opts) && $inf->disp == 'si')
                            <form action="{{ route('opt_est.destroy', $inf->id_opt . '+' . $inf->id_est . '+' . 'index') }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                {{--  @can('Modulo_Optativas.opt_est.destroy')  --}}
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Desmatricular"><i class="fa fa-times"></i></button>
                                {{--  @endcan  --}}
                            </form>
                        @endif
                        @if (in_array($inf->id_opt, $id_opts) && $inf->disp == 'no')
                            <form class="eliminar-optativa_estudiante"
                                action="{{ route('opt_est.destroy', $inf->id_opt . '+' . $inf->id_est . '+' . 'index') }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                {{--  @can('Modulo_Optativas.opt_est.destroy')  --}}
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Desmatricular"><i class="fa fa-times"></i></button>
                                {{--  @endcan  --}}
                            </form>
                        @endif
                        @if (!in_array($inf->id_opt, $id_opts) && $inf->disp == 'no')
                            <button class="btn btn-secondary"><i class="fa fa-ban" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Sin Capacidad"></i></button>
                        @endif
                        @if (count($id_opts) == 2 && !in_array($inf->id_opt, $id_opts) && $inf->disp == 'si')
                        @endif
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
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#opt_estudiante').DataTable({
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

    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    @if (session('info') == 'eliminar-optativa_estudiante')
        <script>
            Swal.fire(
                '¡Desmatriculado!',
                'Estudiante Desmatriculado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'adicionar-optativa_estudiante')
        <script>
            Swal.fire(
                'Matriculado!',
                'Estudiante Matriculado',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'no_puede_desmatricular')
        <script>
            Swal.fire(
                'Usted!',
                'No Puedes Des-Matricular en esta Optativa',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'modificar-optativa_estudiante')
        <script>
            Swal.fire(
                '¡Modificado!',
                'Editado.',
                'success'
            )
        </script>
    @endif
    @if (session('info') == 'importar-optativa_estudiante')
        <script>
            Swal.fire(
                'Insertada!',
                'Matriculado.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.eliminar-optativa_estudiante').submit(function(e) {
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
