    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg pt-4" id="balance">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Frecuencia</th>
                        <th scope="col">Tipo de Clases</th>
                        <th scope="col">Semana</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($balancedecarga as $bc)
                        <tr>
                            <td scope="row">
                                {{ $bc->nombre }}
                            </td>
                            <td>
                                {{ $bc->frecuencia }}
                            </td>
                            <td>
                                {{ $bc->tipo_clase }}
                            </td>
                            <td>
                                {{ $bc->semana }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
