@extends('layouts.principal')
@section('content')
    <h1 class="mb-4">Editar Tarea</h1>
    <form method="POST" action="/tareas/editar/{{ $tarea->id }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Editar Tarea:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $tarea->nombre) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="prioridad" class="form-label">Prioridad:</label>
            <select name="prioridad" id="prioridad" class="form-select" required>
                <option value="urgente" {{ old('prioridad', $tarea->prioridad) == 'urgente' ? 'selected' : '' }}>Urgente</option>
                <option value="alta" {{ old('prioridad', $tarea->prioridad) == 'alta' ? 'selected' : '' }}>Alta</option>
                <option value="normal" {{ old('prioridad', $tarea->prioridad) == 'normal' ? 'selected' : '' }}>Normal</option>
            </select>
        </div>
        <input type="hidden" name="estado" value="0">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="/tareas" class="btn btn-secondary">Volver</a>
    </form>
@endsection