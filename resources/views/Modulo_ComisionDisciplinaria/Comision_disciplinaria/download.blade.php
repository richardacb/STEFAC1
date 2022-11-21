<!DOCTYPE html>
<html>
<head>
    <title>Comisiones</title>
</head>
<body>

<h1>Listado de Comisiones</h1>
<table class="table table-striped">
            <thead>
                <tr>
                   <th scope="col"class=text-center>Comisión</th>
                    <th scope="col"class=text-center>Nombre y Apellidos del Presidente</th>
                    <th scope="col"class=text-center>Nombre y Apellidos del Secretario</th>
                    <th scope="col"class=text-center>Nombre y Apellidos del Miembro</th>
                    <th scope="col"class=text-center> Fecha de Creación</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($comision_disciplinaria as $comision_disciplinaria )
                        <tr>
                       

                         <td> {{ $comision_disciplinaria->Nombre_comision }}</td>

                         <td>{{ $comision_disciplinaria->Presidente }}</td>

                         <td>{{ $comision_disciplinaria->Miembro }}</td>

                         <td>{{ $comision_disciplinaria->miemb }}</td>


                         
                        <td>{{ $comision_disciplinaria->created_at }}</td>

                        @empty
                        @endforelse
</tr>        
                              
                     </body>

 </html>
        
                    