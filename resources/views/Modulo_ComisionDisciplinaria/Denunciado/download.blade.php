<!DOCTYPE html>
<html>
<head>
    <title>Denunciados</title>
</head>
<body>

<h1>Listado de Denunciados</h1>
<table class="table table-striped">
            <thead>
                <tr>
                   <th scope="col"class=text-center>Denunciado</th>
                   <th scope="col"class=text-center>Denuncia</th>
                    <th scope="col"class=text-center>Nombre y Apellidos del Denunciado</th>

                    <th scope="col"class=text-center> Fecha de creación</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($denunciado as $denunciado )
                        <tr>
                        <td>{{ $denunciado->id }}</td>

                         <td> {{ $denunciado->id_denuncia }}</td>

             

                         <td>{{ $denunciado->Nombre_denunciado }}</td>

                         

                            <td>{{ $denunciado->created_at }}</td>

                        @empty
                              @endforelse
                              
                     </body>

 </html>
        
                    