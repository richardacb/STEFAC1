@extends('layouts.app')

@section('content')
    <form action="/opt_prof/{{ json_decode($inf)->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-3">
            <label for="id_opt">Optativa:</label>
            <select class="form-control" name="id_opt" id="">
                <option value="{{ json_decode($inf)->id_opt }}">{{ json_decode($inf)->opt }}</option>
                @foreach ($optativas as $optativa)
                    <option value="{{ $optativa->id }}">{{ $optativa->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label for="id_prof_1">Profesor:</label>
            <select class="form-control" name="id_prof_1" id="">
                <option value="{{ json_decode($inf)->id_prof_1 }}">{{ json_decode($inf)->prof_1 }}</option>
                @foreach ($profesores as $profesor)
                    <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label for="id_prof_2">Profesor:</label>
            <select class="form-control" name="id_prof_2" id="">
                <option value="{{ json_decode($inf)->id_prof_2 }}">{{ json_decode($inf)->prof_2 }}</option>
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
