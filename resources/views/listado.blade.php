@extends('layouts.principal')

@section('content')
    <h1 class="mb-4">Listado de Tareas</h1>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tarea</th>
                <th>Estado</th>
                <th colspan="3" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->nombre }}</td>
                    <td>
                        @if ($tarea->estado)
                            <span class="badge bg-success">Completa</span>
                        @else
                            <span class="badge bg-warning text-dark">Sin completar</span>
                        @endif
                    </td>
                    <td>
                        <a href="/tareas/cambiar/{{ $tarea->id }}" class="btn btn-sm btn-primary">Cambiar</a>
                    </td>
                    <td>
                        <a href="/tareas/editar/{{ $tarea->id }}" class="btn btn-sm btn-warning">Modificar</a>
                    </td>
                    <td>
                        <form action="/tareas/eliminar/{{ $tarea->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/" class="btn btn-secondary">Volver</a>
@endsection