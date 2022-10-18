@extends('layouts.app')

@section('content')
    <form action="/opt_prof" method="POST">
        @csrf
        <div class="mt-3">
            <label for="id_opt">Optativa:</label>
            <select class="form-control" name="id_opt" id="">
                <option value=""></option>
                @foreach ($optativas as $optativa)
                    <option value="{{ $optativa->id }}">{{ $optativa->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label for="id_prof_1">Profesor:</label>
            <select class="form-control" name="id_prof_1" id="">
                <option value=""></option>
                @foreach ($profesores as $profesor)
                    <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label for="id_prof_2">Profesor:</label>
            <select class="form-control" name="id_prof_2" id="">
                <option value=""></option>
                @foreach ($profesores as $profesor)
                    <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <a href="/opt_prof" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection
