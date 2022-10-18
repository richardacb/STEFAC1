@extends('layouts.app')

@section('content')
<a href="profesores/create" class="btn btn-primary">Agregar Profesor</a>
<table class="table table-light table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">C.Docente</th>
            <th scope="col">C.Científica</th>
            <th scope="col">Cargo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profesores as $profesor)
            <tr>
                <td>{{ $profesor->id }}</td>
                <td>{{ $profesor->nombre }}</td>
                <td>{{ $profesor->apellido }}</td>
                <td>{{ $profesor->categoria_docente }}</td>
                <td>{{ $profesor->categoria_cientifica }}</td>
                <td>{{ $profesor->cargo }}</td>
                <td>
                    <form action="{{ route('profesores.destroy', $profesor->id) }}" method="POST">
                        <a href="/profesores/{{ $profesor->id }}/edit" class="btn btn-info">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
