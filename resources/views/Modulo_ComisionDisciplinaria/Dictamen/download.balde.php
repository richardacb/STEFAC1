<!DOCTYPE html>
<html>
<head>
    <title>Dictámen</title>
</head>
<body>

<h1>Listado de Dictámenes</h1>
<table class="table table-striped">
            <thead>
                <tr>
                
                <th>Dictámen:</th>
                <th>Expediente:</th>
                <th>Hechos que se consideran probados:</th>
                <th>Atenuantes:</th>
                <th>Agravantes:</th>
                <th>Resultados del expediente académico:</th>
                <th>Tipo de Falta disciplinaria:</th>
                <th>Medida disciplinaria:</th>
                <th>Fecha de creación:</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($dictamen as $dictamen)
                        <tr>
                            <td>
                            {{ $dictamen->id }}
                            </td>
                        <td scope="row">
                           @foreach ($expediente as $na)
                               @if ($dictamen->id_expediente === $na->id)
                               
                                 {{ $na->id }}
                               @endif
                               
                           @endforeach

                       </td>
                       
                    

                         <td>
                            {{ $dictamen->hechos }}
                        </td>
                         <td>
                            {{ $dictamen->atenuantes }}
                        </td>
                         <td>
                            {{ $dictamen->agravantes }}
                        </td>
                        <td>
                            {{ $dictamen->resultadosexpacd }}
                        </td>
                        <td>
                            {{ $dictamen->tipofalta }}
                        </td>
                        <td>
                            {{ $dictamen->medida }}
                        </td>
                             
                       
                         <td>
                            {{ $dictamen->created_at }}
                        </td>

                         @empty
                        @endforelse
</tr>        
                              
                     </body>

 </html>
        
        
                    