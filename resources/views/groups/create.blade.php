@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Grupo</h1>
    
    <form action="{{ route('groups.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="semester">Semestre</label>
            <input type="text" class="form-control" name="semester" id="semester" required>
        </div>
        <div class="form-group">
            <label for="group">Grupo</label>
            <input type="text" class="form-control" name="group" id="group" required>
        </div>
        <div class="form-group">
            <label for="shift">Turno</label>
            <input type="text" class="form-control" name="shift" id="shift" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
