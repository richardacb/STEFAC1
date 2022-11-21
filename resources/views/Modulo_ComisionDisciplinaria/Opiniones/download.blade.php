<!DOCTYPE html>
<html>
<head>
    <title>Opiniones</title>
</head>
<body>

<h1>Listado de Opiniones</h1>
<table class="table table-striped">
            <thead>
                <tr>
                
                <th>Expediente</th>
                <th>Denuncia</th>
                <th>Nombre y Apellidos</th>
                <th>Responsabilidad o cargo</th>
                <th>Opinión</th>
                <th>Fecha de creación</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($opiniones as $opiniones)
                        <tr>
                        <td scope="row">
                           @foreach ($expediente as $na)
                               @if ($opiniones->id_expediente === $na->id)
                               
                                 {{ $na->id }}
                               @endif
                               
                           @endforeach

                       </td>
                       
                       <td scope="row">
                           @foreach ($expediente as $na)
                               @if ($opiniones->id_expediente === $na->id)
                               
                                {{ $na->id_denuncia }}
                               @endif
                               
                           @endforeach

                       </td>
                         <td>
                            {{ $opiniones->Nombre }}
                        </td>
                         <td>
                            {{ $opiniones->responsabilidad }}
                        </td>
                         <td>
                            {{ $opiniones->descripcion }}
                        </td>
                             
                       
                         <td>
                            {{ $opiniones->created_at }}
                        </td>

                         @empty
                        @endforelse
</tr>        
                              
                     </body>

 </html>
        
        
                    