<!--Modal Grafica---->
<div class="modal fade grafica_evidencia" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
 <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Gráfica según Tipo Actividad</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div>
 <div class="modal-body">
     <div id="donutChart" data-bs-act_1="{{ $count_act_1 }}" data-bs-act_2="{{ $count_act_2 }}"
         data-bs-act_3="{{ $count_act_3 }}" data-bs-act_4="{{ $count_act_4 }}"
         style="text-align: center; display: block ruby;">
     </div>
 </div>
 <script>
     document.addEventListener("DOMContentLoaded", () => {
         var datos = document.querySelector("#donutChart")
         var act_1 = Number(datos.getAttribute('data-bs-act_1'))
         var act_2 = Number(datos.getAttribute('data-bs-act_2'))
         var act_3 = Number(datos.getAttribute('data-bs-act_3'))
         var act_4 = Number(datos.getAttribute('data-bs-act_4'))


         var options = {
             series: [act_1, act_2, act_3, act_4],
             chart: {
                 type: 'pie',
                 width: 600,
                 toolbar: {
                     show: true,
                 }
             },
             labels: ['Político Ideológico', 'Académico', 'Investigativa', 'Extensión Universitaria'],
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
</div>
</div>
</div>

