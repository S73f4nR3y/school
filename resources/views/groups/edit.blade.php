@extends('layouts.app')

@section('content')
    <h1>Editar Grupo</h1>

    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="semester">Semestre</label>
            <input type="text" class="form-control" name="semester" value="{{ $group->semester }}" required>
        </div>
        <div class="form-group">
            <label for="group">Grupo</label>
            <input type="text" class="form-control" name="group" value="{{ $group->group }}" required>
        </div>
        <div class="form-group">
            <label for="shift">Turno</label>
            <input type="text" class="form-control" name="shift" value="{{ $group->shift }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection
