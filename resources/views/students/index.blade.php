@extends('layouts.app')

@section('content')
    <h1>Estudiantes</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Nuevo Estudiante</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Grupo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->group->group }}</td> <!-- Muestra el nombre del grupo -->
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
