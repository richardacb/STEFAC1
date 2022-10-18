@extends('layouts.app')

@section('content')
<a href="estudiantes/create" class="btn btn-primary">Agregar Estudiante</a>
<table class="table table-light table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Año</th>
            <th scope="col">Grupo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->id }}</td>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->anno }}</td>
                <td>{{ $estudiante->grupo }}</td>
                <td>
                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                        <a href="/estudiantes/{{ $estudiante->id }}/edit" class="btn btn-info">Editar</a>
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
