@extends('layouts.app')

@section('content')
    <h1>Estudiantes de {{ $group->group }} - {{ $group->semester }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('groups.index') }}" class="btn btn-primary">Volver a Grupos</a>
@endsection
