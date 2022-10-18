@extends('adminlte::page')

@section('title', 'STE')

@section('content_header')
    <h1><strong>Perfil de usuario</strong></h1>
@stop

@section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Perfildeusuarios.css') }}">
@endsection

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="{{ asset('img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                    <h2>{{ $users->primer_nombre }} {{ $users->segundo_nombre }}</h2>
                    <h3>Web Designer</h3>
                    <div class="flex-row mt-2">
                        <a href="{{ route('usuarios.index') }}" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Regresar" class="btn btn-danger"><i class="fa fa-reply"></i></a>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs ">
                        @if ($users->tipo_de_usuario == 'Estudiante')
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#perfil">Perfil</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#datos-personales">Datos
                                    personales</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#perfil-dianostico-preventivo">Diagnostico preventivo</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#perfil">Perfil</a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active perfil" id="perfil">



                            <h5 class="card-title ml-5 my-2">Detalles del perfil</h5>
                            <br>
                            <hr width="90%">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nombre:</div>
                                <div class="col-lg-9 col-md-8">{{ $users->primer_nombre }}
                                    {{ $users->segundo_nombre }} </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Apellidos:</div>
                                <div class="col-lg-9 col-md-8"> {{ $users->primer_apellido }}
                                    {{ $users->segundo_apellido }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Categoria:</div>
                                <div class="col-lg-9 col-md-8">{{ $users->tipo_de_usuario }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Año Académico:</div>
                                @if (isset($users->anno))
                                    <div class="col-lg-9 col-md-8">{{ $users->anno }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Usuario:</div>
                                <div class="col-lg-9 col-md-8">{{ $users->username }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Solapin:</div>
                                <div class="col-lg-9 col-md-8">{{ $users->solapin }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Carnet:</div>
                                <div class="col-lg-9 col-md-8">{{ $users->ci }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Email:</div>
                                <div class="col-lg-9 col-md-8">{{ $users->email }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Sexo:</div>
                                <div class="col-lg-9 col-md-8">{{ $users->sexo }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Municipio:</div>
                                <div class="col-lg-9 col-md-8"> {{ $users->municipio }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Provincia:</div>
                                <div class="col-lg-9 col-md-8">{{ $users->provincia }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Color de piel:</div>
                                <div class="col-lg-9 col-md-8">{{ $users->color_piel }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Telefono:</div>
                                @if (isset($users->telefono_casa))
                                    <div class="col-lg-9 col-md-8">{{ $users->telefono_casa }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Celular:</div>
                                @if (isset($users->celular))
                                    <div class="col-lg-9 col-md-8">{{ $users->celular }} </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Telefono-UCI:</div>
                                @if (isset($users->telefono_uci))
                                    <div class="col-lg-9 col-md-8">{{ $users->telefono_uci }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Cantidad de Optativas Cursadas:</div>
                                @if (isset($cant_opt))
                                    <div class="col-lg-9 col-md-8">{{ $cant_opt }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                            @if ($users->tipo_de_usuario == 'Estudiante')
                                <h5 class="card-title ml-5 mt-3">Caracterizacion del Usuario</h5>
                                <br>
                                <br>

                                <div class="row">
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita animi facilis
                                        veniam dolorem quasi dolores voluptate iste ipsum nulla iure.
                                        Nulla quae sed explicabo asperiores accusantium omnis ad ab veniam?Lorem ipsum
                                        dolor
                                        sit amet, consectetur adipisicing elit. At eius deserunt quisquam aliquid
                                        numquam
                                        praesentium,
                                        quis quaerat explicabo neque. Quaerat odit, asperiores at minima minus
                                        necessitatibus numquam consequatur quia eaque!$loop->lo</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita animi facilis
                                        veniam dolorem quasi dolores voluptate iste ipsum nulla iure.
                                        Nulla quae sed explicabo asperiores accusantium omnis ad ab veniam?Lorem ipsum
                                        dolor
                                        sit amet, consectetur adipisicing elit. At eius deserunt quisquam aliquid
                                        numquam
                                        praesentium,
                                        quis quaerat explicabo neque. Quaerat odit, asperiores at minima minus
                                        necessitatibus numquam consequatur quia eaque!$loop->lo</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita animi facilis
                                        veniam dolorem quasi dolores voluptate iste ipsum nulla iure.
                                        Nulla quae sed explicabo asperiores accusantium omnis ad ab veniam?Lorem ipsum
                                        dolor
                                        sit amet, consectetur adipisicing elit. At eius deserunt quisquam aliquid
                                        numquam
                                        praesentium,
                                        quis quaerat explicabo neque. Quaerat odit, asperiores at minima minus
                                        necessitatibus numquam consequatur quia eaque!$loop->lo</p>
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade datos-personales pt-3" id="datos-personales">

                            <h5 class="card-title ml-5 my-2">Datos personales del estudiante</h5>
                            {{-- @can('Modulo_PerfildeUsuario.diagnosticopreventivo.edit') --}}
                            @if (isset($users->estudiantes))
                                <a class="btn btn-primary btn-sm float-right"
                                    href="{{ route('estudiantes.edit', $users->estudiantes->id) }}"><i
                                        class="fa fa-edit"></i></a>
                                {{-- @endif --}}
                            @endcan
                            <br>
                            <hr width="90%">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Grupo:</div>
                                <div class="col-lg-9 col-md-8">
                                    @if (isset($users->estudiantes))
                                        <div class="col-lg-9 col-md-8">{{ $users->estudiantes->grupos->name }}
                                        </div>
                                    @else
                                        <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Tipo de estudiante:</div>
                                @if (isset($users->estudiantes))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->tipo_estudiante }}
                                    </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nombre de la madre:</div>
                                @if (isset($users->estudiantes))
                                    <div class="col-lg-9 col-md-8"> {{ $users->estudiantes->nombre_madre }}
                                    </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Direccion completa:</div>
                                @if (isset($users->estudiantes))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->direccion_completa }}
                                    </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Via de ingreso:</div>
                                @if (isset($users->estudiantes))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->via_ingreso }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Organizacion politica:</div>
                                @if (isset($users->estudiantes->organizacion_politica))
                                    <div class="col-lg-9 col-md-8">
                                        {{ $users->estudiantes->organizacion_politica }}
                                    </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Situacion militar:</div>
                                @if (isset($users->estudiantes->situacion_militar))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->situacion_militar }}
                                    </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Centro de trabajo: </div>
                                @if (isset($users->estudiantes->centro_trabajo))
                                    <div class="col-lg-9 col-md-8"> {{ $users->estudiantes->centro_trabajo }}
                                    </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Discapacidad:</div>
                                @if (isset($users->estudiantes->discapacidad))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->discapacidad }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Periodo lectivo:</div>
                                @if (isset($users->estudiantes->periodo_lectivo))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->periodo_lectivo }}
                                    </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Tpo de curso:</div>
                                @if (isset($users->estudiantes->periodo_lectivo))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->tipo_curso }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Versión plan de estudio:</div>
                                @if (isset($users->estudiantes->plan_estudio))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->plan_estudio }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Organizacion de P.E:</div>
                                @if (isset($users->estudiantes->plan_estudio))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->organizacion_pe }}
                                    </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Situación escolar:</div>
                                @if (isset($users->estudiantes->plan_estudio))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->situacion_escolar }}
                                    </div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Cohorte estudiantil:</div>
                                @if (isset($users->estudiantes->plan_estudio))
                                    <div class="col-lg-9 col-md-8">
                                        {{ $users->estudiantes->cohorte_estudiantil }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Estado:</div>
                                @if (isset($users->estudiantes->plan_estudio))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->is_enabled }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Valor opción:</div>
                                @if (isset($users->estudiantes->opcion_uci))
                                    <div class="col-lg-9 col-md-8">{{ $users->estudiantes->opcion_uci }}</div>
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                    </div>

                    <div class="tab-pane fade perfil-dianostico-preventivo pt-3"
                        id="perfil-dianostico-preventivo">

                        <h5 class="card-title ml-5 my-2">Diagnostico preventivo del estudiante</h5>
                        {{-- @can('Modulo_PerfildeUsuario.diagnosticopreventivo.edit') --}}
                        @if (isset($users->diagnosticopreventivo))
                            <a class="btn btn-primary btn-sm float-right"
                                href="{{ route('diagnosticopreventivo.edit', $users->diagnosticopreventivo->id) }}"><i
                                    class="fa fa-edit"></i></a>
                        @endif
                        {{-- @endcan --}}
                        <br>
                        <hr width="90%">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Nacionalidad</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->nacionalidad))
                                    {{ $users->diagnosticopreventivo->nacionalidad }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Adicciones_Alcohol</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->adicciones_Alcohol))
                                    {{ $users->diagnosticopreventivo->adicciones_Alcohol }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Adicciones_Tabaco</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->adicciones_Tabaco))
                                    {{ $users->diagnosticopreventivo->adicciones_Tabaco }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Adicciones_Café</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->adicciones_Café))
                                    {{ $users->diagnosticopreventivo->adicciones_Café }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Adicciones_Tecnoadicciones</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->adicciones_Tecnoadicciones))
                                    {{ $users->diagnosticopreventivo->adicciones_Tecnoadicciones }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Adicciones_Drogas</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->adicciones_Drogas))
                                    {{ $users->diagnosticopreventivo->adicciones_Drogas }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Tipo_medicamentos</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->tipo_medicamentos))
                                    {{ $users->diagnosticopreventivo->tipo_medicamentos }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Consumo de medicamento</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->tipo_medicamentos_consumo))
                                    {{ $users->diagnosticopreventivo->tipo_medicamentos_consumo }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Grupos Sociales</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->grupo_social))
                                    {{ $users->diagnosticopreventivo->grupo_social }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Creencias Religiosas</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->creencia_religiosa))
                                    {{ $users->diagnosticopreventivo->creencia_religiosa }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Tipo de problemas</div>
                            <div class="col-lg-9 col-md-8">
                                @if (isset($users->diagnosticopreventivo->tipos_de_problemas))
                                    {{ $users->diagnosticopreventivo->tipos_de_problemas }}
                                @else
                                    <div class="col-lg-9 col-md-8"> -- -- -- -- -- -- </div>
                                @endif
                            </div>
                        </div>
                    </div>


                </div><!-- End Bordered Tabs -->

            </div>

        </div>

    </div>
</div>
</section>

@stop
@section('js')
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<script src="{{ asset('js/sweetalert2@11.js') }}"></script>
@if (session('info') == 'modificar-diagnostico')
<script>
    Swal.fire(
        '¡Modificado!',
        'El diagnostico se modifico con exito.',
        'success'
    )
</script>
@endif
@if (session('info') == 'modificar-datos-estudiantes')
<script>
    Swal.fire(
        '¡Modificado!',
        'Los datos del estudiantes se modificaron con exito.',
        'success'
    )
</script>
@endif
@endsection
