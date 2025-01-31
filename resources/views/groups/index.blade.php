@extends('layouts.app')

@section('content')
    <h1>Grupos</h1>
    <a href="{{ route('groups.create') }}" class="btn btn-primary">Nuevo Grupo</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Semestre</th>
                <th>Grupo</th>
                <th>Turno</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{{ $group->semester }}</td>
                    <td>{{ $group->group }}</td>
                    <td>{{ $group->shift }}</td>
                    <td>
                        <!-- Botón para editar el grupo -->
                        <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-warning">Editar</a>
                        
                        <!-- Formulario para eliminar el grupo -->
                        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        
                        <!-- Botón para ver los estudiantes del grupo -->
                        <a href="{{ route('groups.showStudents', $group->id) }}" class="btn btn-info">Ver Estudiantes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
