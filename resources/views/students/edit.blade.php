@extends('layouts.app')

@section('content')
    <h1>Editar Estudiante</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" class="form-control" name="first_name" value="{{ $student->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" class="form-control" name="last_name" value="{{ $student->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="age">Edad</label>
            <input type="number" class="form-control" name="age" value="{{ $student->age }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $student->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" class="form-control" name="phone" value="{{ $student->phone }}" required>
        </div>
        <div class="form-group">
            <label for="group_id">Grupo</label>
            <select class="form-control" name="group_id" required>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ $student->group_id == $group->id ? 'selected' : '' }}>
                        {{ $group->group }} - {{ $group->semester }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
