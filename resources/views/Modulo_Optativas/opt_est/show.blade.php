@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <h1>informacion de estudiante</h1>
    </div>
    <strong>nombre:</strong> <br>
    <strong>grupo:</strong> <br>
    <strong>año:</strong> <br>
    <strong> optativas cursadas: {{ $cant_opt }} </strong><br>
@endsection
