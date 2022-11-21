@extends('adminlte::page')
@section('title', 'Reportes')

<link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">



@section('title')
{{ $title='Reportes' }}
@stop

@section('content_header')
<!-- targetas -->

<div class="row">

	<div class="col-lg-3 col-xs-6">
		<!-- targeta-->
		<div class="small-box bg-primary">
		
			<div class="inner" >
			
				<h3>
                <td>
				{{$count_falta}} <i class="bi bi-pencil"></i>
                </td>
				</h3>
				<p>
					Total Dictámenes
				</p>
			</div>
</div>
	</div>


	<div class="col-lg-3 col-xs-6">
		<!-- targeta2 -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>
				{{ $count_tipofalta3 }} <i class="bi bi-key"></i>
				</h3>
				<p>
					Faltas Menos Graves
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			
		</div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- ttargeta3 -->
		<div class="small-box bg-yellow">
		<div class="inner">
				<h3>
				{{ $count_tipofalta1 }} <i class="bi bi-key"></i>
				</h3>
				<p>
					Faltas Graves
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			
		</div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- targeta4 -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
				{{ $count_tipofalta2 }} <i class="bi bi-key"></i>
				</h3>
				<p>
					Faltas Muy Graves
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			
		</div>
	</div><!-- ./col -->
</div><!-- /.row -->



<script src="/js/chart.min.js"></script>

<div class="row">

<div class="col-4">
<canvas id="myChart" width="400" height="400">  <p>Reporte:</p></canvas>
<script>
const ctx = document.getElementById('myChart');

const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Menos Graves', 'Graves', 'Muy Graves',],
        datasets: [{
            label: 'Cantidad',
            data: [ {{$count_tipofalta3}}, {{$count_tipofalta1}}, {{$count_tipofalta2}} ],
            backgroundColor: [
      'rgb(78, 115, 223)',
      'rgb(246,194,62)',
      'rgb(28, 200, 138)'
    ],
            borderWidth: 2
        }]
    },
    options: {
        layout: {
            padding: {
                left: 50
            }
        }
    }
});
</script>
</div>

<div class="col-8">
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"><title>Facultad</title></head>
<body id="page-top">
<div class="container py-4 py-xl-5">
<div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
<div class="col">

<div class="card">
<div class="card-body p-4"><p class="text-primary card-text mb-0"></p><h4 class="card-title">Total de Denuncias</h4>
<br>
<div class="d-flex"><div><p class="fw-bold mb-0">{{$count_denuncia}}</p></h4></div></div>
</div></div></div>

<div class="col">
<div class="card">
<div class="card-body p-4"><p class="text-primary card-text mb-0"></p><h4 class="card-title">Denuncias en Proceso</h4><br><div class="d-flex"><div><p class="fw-bold mb-0">{{$count_dp}}</p></div></div></div></div></div><div class="col">
<div class="card"><div class="card-body p-4"><h4 class="card-title">Denuncias Finalizadas<br></h4><br><div class="d-flex"><div><p class="fw-bold mb-0">{{$count_df}}</p></div></div></div></div></div></div>

<div class="container py-4 py-xl-5"><div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
<div class="col"><div class="card"><div class="card-body p-4"><h4 class="card-title">Facultad 4</h4><br><div class="d-flex"><div><p class="fw-bold mb-0">Tiene {{$count_tipofalta2}} locales disponibles</p></div></div></div></div></div>
<div class="col"><div class="card"><div class="card-body p-4"><h4 class="card-title">CITEC</h4><br><div class="d-flex"><div><p class="fw-bold mb-0">Tiene {{$count_tipofalta2}} locales disponibles</p></div></div></div></div></div>
<div class="col"><div class="card"><div class="card-body p-4"><h4 class="card-title">FTE</h4><br><div class="d-flex"><div><p class="fw-bold mb-0">Tiene {{$count_tipofalta2}} locales disponibles</p></div></div></div></div></div></div></div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script><script src="assets/js/script.min.js"></script></body></html>
</div>
</div>







@stop

@section('scripts')
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="adminlte/js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="adminlte/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="adminlte/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="adminlte/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="adminlte/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="adminlte/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="adminlte/js/AdminLTE/dashboard.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/js/AdminLTE/demo.js" type="text/javascript"></script>
@stop