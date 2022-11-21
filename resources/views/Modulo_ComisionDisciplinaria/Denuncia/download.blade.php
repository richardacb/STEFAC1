<!DOCTYPE html>
<html>
<head>
    <title>Denuncias</title>
</head>
<body>

<h1>Listado de Denuncias</h1>
<table class="table table-striped">
            <thead>
                <tr>
                   <th scope="col"class=text-center>Denuncia</th>
                    <th scope="col"class=text-center>Nombre y Apellidos del Denunciante</th>
                    <th scope="col"class=text-center>Descripción</th>
                    <th scope="col"class=text-center>Comision</th>
                    <th scope="col"class=text-center> Fecha de creación</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($denuncia as $denuncia )
                        <tr>
                        <td>{{ $denuncia->id }}</td>

                         <td> {{ $denuncia->Nombre_denunciante }}</td>

             

                         <td>{{ $denuncia->descripcion }}</td>

                         <td scope="row">
                                @foreach ($nombrecomision as $na)
                                @if ($denuncia->id_comision === $na->id)
                                        {{ $na->Nombre_comision }}
                                        @endif 
                                @endforeach
                                </td>

                            <td>{{ $denuncia->created_at }}</td>

                        @empty
                              @endforelse
                              
                     </body>

 </html>
        
                    