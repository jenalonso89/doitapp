@extends('layouts.principal')
@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Ranking de Usuarios</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)    
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->points }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/"><button class="btn btn-primary mt-3">Volver</button></a>
        </div>
    </div>
@endsection
