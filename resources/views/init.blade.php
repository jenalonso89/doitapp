@extends('layouts.principal')

@section('content')
    <h1 class="mb-4">Doit app</h1>

    <form method="POST" action="/tarea/crear">
        @csrf 

        <div class="mb-3">
            <label class="form-label">Tarea:</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="prioridad">Prioridad:</label>
            <select name="prioridad" id="prioridad" class="form-select">
                <option value="urgente">Urgente</option>
                <option value="alta">Alta</option>
                <option value="normal">Normal</option>
            </select>
        </div>
        <input type="hidden" name="estado" value="0">
        <button type="submit" class="btn btn-primary">Crear tarea</button>
        <a href="/tareas" class="btn btn-secondary">Ver tareas</a>
        <a href="/ranking" class="btn btn-info">Ranking</a>
    </form>
@endsection
