<!-- Modal -->
<div class="modal fade importar_estudiantes" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Importar datos de estudiantes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('estudiantes.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="import_file" />
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Importar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Fin Modal -->

<!-- Modal -->
<div class="modal fade grafica_anno" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Grafica de estudiantes por año</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="donutChart" data-bs-anno_1="{{ $count_anno_1 }}" data-bs-anno_2="{{ $count_anno_2 }}"
                    data-bs-anno_3="{{ $count_anno_3 }}" data-bs-anno_4="{{ $count_anno_4 }}"
                    data-bs-anno_5="{{ $count_anno_5 }}" style="text-align: center; display: block ruby;">
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    var datos = document.querySelector("#donutChart")
                    var anno_1 = Number(datos.getAttribute('data-bs-anno_1'))
                    var anno_2 = Number(datos.getAttribute('data-bs-anno_2'))
                    var anno_3 = Number(datos.getAttribute('data-bs-anno_3'))
                    var anno_4 = Number(datos.getAttribute('data-bs-anno_4'))
                    var anno_5 = Number(datos.getAttribute('data-bs-anno_5'))

                    var options = {
                        series: [anno_1, anno_2, anno_3, anno_4, anno_5],
                        chart: {
                            type: 'pie',
                            width: 600,
                            toolbar: {
                                show: true,
                            }
                        },
                        labels: ['Primer Año', 'Segundo Año', 'Tercer Año', 'Cuarto Año', 'Quinto Año'],
                        responsive: [{
                            breakpoint: 980,
                            options: {
                                chart: {
                                    width: 400
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                    };
                    var chart = new ApexCharts(datos, options);
                    chart.render();
                });
            </script>
            <!-- End Donut Chart -->
            <br>
        </div>
    </div>
</div>
<!--Fin Modal -->
