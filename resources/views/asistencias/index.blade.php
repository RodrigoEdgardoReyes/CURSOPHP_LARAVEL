@extends('layouts.asistencia')

@section('content')
    <h1>Lista de Asistencias</h1>
    <a href="{{ route('asistencias.create') }}" class="btn btn-primary">Registrar Asistencia</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Grupo</th>
                <th>Fecha</th>
                <th>Hora Entrada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->estudiante->nombre }}</td>
                    <td>{{ $asistencia->grupo->nombre }}</td>
                    <td>{{ $asistencia->fecha }}</td>
                    <td>{{ $asistencia->hora_entrada }}</td>
                    <td>
                        <a href="{{ route('asistencias.show', $asistencia) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('asistencias.edit', $asistencia) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('asistencias.destroy', $asistencia) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $asistencias->links() }}
@endsection
