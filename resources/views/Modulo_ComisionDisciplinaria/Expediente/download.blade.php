<!DOCTYPE html>
<html>
<head>
    <title>Expedientes</title>
</head>
<body>

<h2>Listado de Expedientes</h2>
<table class="table table-striped">
            <thead>
                <tr>
                   <th scope="col"class=text-center>Expediente</th>
                    <th scope="col"class=text-center>Nombre y Apellidos del estudiante denunciado</th>
                    <th scope="col"class=text-center> Fecha de Creación</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($expediente as $expediente )
                        <tr>
                        <td>{{ $expediente->id }}</td>

                        <td scope="row">
                                @foreach ($denunciado as $d)
                                    @if ( $expediente->id_denunciado === $d->id)
                                    {{ $d->Nombre_denunciado}}
                                    
                                    @endif
                                @endforeach
                                </td>
                                <td scope="row">
                                @foreach ($denuncia as $de)
                                    @if ( $expediente->id_denuncia === $de->id)
                                    {{ $de->id}}
                                    
                                    @endif
                                @endforeach
                                </td>

                        
                                
                         

                            <td>{{ $expediente->created_at }}</td>

                        @empty
                              @endforelse
                              
                     </body>
                     

 </html>