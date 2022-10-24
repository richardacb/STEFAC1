<!-- Modal Gráfica que representa las adicciones de los estudiantes-->
<div class="modal fade" id="grafica_reportes1" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gráfica que reprecenta las adicciones de los estudiantes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="pieChart1" data-bs-consumoTR="{{ $count_consumoTR }}"
                                    data-bs-consumoTO="{{ $count_consumoTO }}"
                                    data-bs-consumoSA="{{ $count_consumoSA }}"
                                    data-bs-consumoRA="{{ $count_consumoRA }}"
                                    data-bs-consumoDC="{{ $count_consumoDC }}"
                                    data-bs-consumoC="{{ $count_consumoC }}"
                                    data-bs-consumoUEV="{{ $count_consumoUEV }}"
                                    data-bs-consumoCO="{{ $count_consumoCO }}"
                                    data-bs-consumoMA="{{ $count_consumoMA }}"
                                    data-bs-consumoDS="{{ $count_consumoDS }}"
                                style="">
                            </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    var datos = document.querySelector("#pieChart1")
                    var consumoTR = Number(datos.getAttribute('data-bs-consumoTR'))
                    var consumoTO = Number(datos.getAttribute('data-bs-consumoTO'))
                    var consumoSA = Number(datos.getAttribute('data-bs-consumoSA'))
                    var consumoRA = Number(datos.getAttribute('data-bs-consumoRA'))
                    var consumoDC = Number(datos.getAttribute('data-bs-consumoDC'))
                    var consumoC = Number(datos.getAttribute('data-bs-consumoC'))
                    var consumoUEV = Number(datos.getAttribute('data-bs-consumoUEV'))
                    var consumoCO = Number(datos.getAttribute('data-bs-consumoCO'))
                    var consumoMA = Number(datos.getAttribute('data-bs-consumoMA'))
                    var consumoDS = Number(datos.getAttribute('data-bs-consumoDS'))
                    var options = {
                        series: [consumoTR, consumoTO, consumoSA, consumoRA, consumoDC, consumoC, consumoUEV, consumoCO, consumoMA, consumoDS],
                        chart: {
                            type: 'pie',
                            width: 600,
                            toolbar: {
                                show: true,
                            }
                        },
                        labels: ['Consumo regular de Cigarros', 'Consumo ocasional de cigarros', 'Consumo social de alcohol', 'Consumo riesgoso de alcohol','Consumo dañino de Café','Ciberadicción','Uso excesivo de videojuegos','Cocaina','Marihuana','drogas sintéticas'],
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
        </div>
    </div>
</div>
<!--Fin Modal -->

<!-- Modal Medicamentos-->
<div class="modal fade" id="grafica_reportes2" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gráfica de tipo de medicamentos que consumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="pieChart2" data-bs-consumoCMPM="{{ $count_consumoCMPM }}"
                data-bs-consumoCMA="{{ $count_consumoCMA }}" style="">
            </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    var datos = document.querySelector("#pieChart2")
                    var consumoCMPM = Number(datos.getAttribute('data-bs-consumoCMPM'))
                    var consumoCMA = Number(datos.getAttribute('data-bs-consumoCMA'))

                    var options = {
                        series: [consumoCMPM, consumoCMA],
                        chart: {
                            type: 'pie',
                            width: 700,
                            toolbar: {
                                show: true,
                            }
                        },
                        labels: ['Consumo de medicamentos por prescripción médica', 'Consumo de medicamentos por automedicación'],
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
        </div>
    </div>
</div>
<!--Fin Modal -->

<!-- Modal Grupo social-->
<div class="modal fade" id="grafica_reportes3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gráfica de estudiantes por año</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="pieChart3"
                data-bs-grupo_socialHI="{{ $count_grupo_socialHI }}"
                data-bs-grupo_socialRO="{{ $count_grupo_socialRO }}"
                data-bs-grupo_socialRA="{{ $count_grupo_socialRA }}"
                data-bs-grupo_socialGO="{{ $count_grupo_socialGO }}"
                data-bs-grupo_socialDA="{{ $count_grupo_socialDA }}"
                data-bs-grupo_socialEM="{{ $count_grupo_socialEM }}"
                data-bs-grupo_socialPU="{{ $count_grupo_socialPU }}"
                data-bs-grupo_socialHE="{{ $count_grupo_socialHE }}">
            </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    var datos = document.querySelector("#pieChart3")
                    var grupo_socialHI = Number(datos.getAttribute('data-bs-grupo_socialHI'))
                    var grupo_socialRO = Number(datos.getAttribute('data-bs-grupo_socialRO'))
                    var grupo_socialRA = Number(datos.getAttribute('data-bs-grupo_socialRA'))
                    var grupo_socialGO = Number(datos.getAttribute('data-bs-grupo_socialGO'))
                    var grupo_socialDA = Number(datos.getAttribute('data-bs-grupo_socialDA'))
                    var grupo_socialEM = Number(datos.getAttribute('data-bs-grupo_socialEM'))
                    var grupo_socialPU = Number(datos.getAttribute('data-bs-grupo_socialPU'))
                    var grupo_socialHE = Number(datos.getAttribute('data-bs-grupo_socialHE'))

                    var options = {
                        series: [grupo_socialHI, grupo_socialRO, grupo_socialRA, grupo_socialGO, grupo_socialDA, grupo_socialEM, grupo_socialPU, grupo_socialHE],
                        chart: {
                            type: 'pie',
                            width: 600,
                            toolbar: {
                                show: true,
                            }
                        },
                        labels: ['Hippies','Rockeros','Raperos','Góticos','Darks','Emos','Punk','Heavyes'],
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
        </div>
    </div>
</div>
<!--Fin Modal -->

<!-- Modal Creencia religiosa-->
<div class="modal fade" id="grafica_reportes4" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Grafica de estudiantes por año</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="pieChart4"
                data-bs-creencia_religiosaA="{{ $count_creencia_religiosaA }}"
                data-bs-creencia_religiosaCA="{{ $count_creencia_religiosaCA }}"
                data-bs-creencia_religiosaCI="{{ $count_creencia_religiosaCI }}"
                data-bs-creencia_religiosaPO="{{ $count_creencia_religiosaPO }}"
                data-bs-creencia_religiosaSA="{{ $count_creencia_religiosaSA }}"
                data-bs-creencia_religiosaYO="{{ $count_creencia_religiosaYO }}"
                data-bs-creencia_religiosaHER="{{ $count_creencia_religiosaHER }}"
                data-bs-creencia_religiosaPM="{{ $count_creencia_religiosaPM }}">
            </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    var datos = document.querySelector("#pieChart4")
                    var creencia_religiosaA  = Number(datos.getAttribute('data-bs-creencia_religiosaA'))
                    var creencia_religiosaCA = Number(datos.getAttribute('data-bs-creencia_religiosaCA'))
                    var creencia_religiosaCI = Number(datos.getAttribute('data-bs-creencia_religiosaCI'))
                    var creencia_religiosaPO = Number(datos.getAttribute('data-bs-creencia_religiosaPO'))
                    var creencia_religiosaSA = Number(datos.getAttribute('data-bs-creencia_religiosaSA'))
                    var creencia_religiosaYO = Number(datos.getAttribute('data-bs-creencia_religiosaYO'))
                    var creencia_religiosaHER = Number(datos.getAttribute('data-bs-creencia_religiosaHER'))
                    var creencia_religiosaPM = Number(datos.getAttribute('data-bs-creencia_religiosaPM'))

                    var options = {
                        series: [creencia_religiosaA,creencia_religiosaCA,creencia_religiosaCI,creencia_religiosaPO,creencia_religiosaSA,creencia_religiosaYO,creencia_religiosaHER,creencia_religiosaPM],
                        chart: {
                            type: 'pie',
                            width: 600,
                            toolbar: {
                                show: true,
                            }
                        },
                        labels: ['Ateos', 'Católicos','Cristianos','Protestantes','Santería','Yoruba','Hermandad','Palo Monte'],
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
        </div>
    </div>
</div>
<!--Fin Modal -->
