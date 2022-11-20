<div class="card">
    <div class="card-body">
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
    </div>
</div>