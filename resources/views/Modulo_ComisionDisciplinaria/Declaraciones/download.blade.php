
      <!DOCTYPE html>
<html>
<head>
    <title>Declaraciones</title>
</head>
<body>

<h1>Listado de Declaraciones</h1>
<table class="table table-striped">
            <thead>
                <tr>
                
                <th>Expediente</th>
                <th>Denuncia</th>
                <th>Nombre del declarante</th>
                <th>Tipo de declarante</th>
                <th>Declaración de los hechos</th>
                <th>Fecha de creación</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($declaraciones as $declaraciones)
                        <tr>
                        <td scope="row">
                           @foreach ($expediente as $na)
                               @if ($declaraciones->id_expediente === $na->id)
                               
                                 {{ $na->id }}
                               @endif
                               
                           @endforeach

                       </td>
                       
                       <td scope="row">
                           @foreach ($expediente as $na)
                               @if ($declaraciones->id_expediente === $na->id)
                               
                                {{ $na->id_denuncia }}
                               @endif
                               
                           @endforeach

                       </td>
                         <td>
                            {{ $declaraciones->Nombre_declarante }}
                        </td>
                         <td>
                            {{ $declaraciones->cargo }}
                        </td>
                         <td>
                            {{ $declaraciones->declaracion_hechos }}
                        </td>
                             
                       
                         <td>
                            {{ $declaraciones->created_at }}
                        </td>

                         @empty
                        @endforelse
</tr>        
                              
                     </body>

 </html>
        
        
                    