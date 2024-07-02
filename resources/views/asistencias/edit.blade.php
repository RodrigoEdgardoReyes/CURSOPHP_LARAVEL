@extends('layouts.asistencia')

@section('content')
    <h1>Editar Asistencia</h1>
    <form action="{{ route('asistencias.update', $asistencia) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="estudiante_id">Estudiante</label>
            <select name="estudiante_id" id="estudiante_id" class="form-control">
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}" {{ $asistencia->estudiante_id == $estudiante->id ? 'selected' : '' }}>{{ $estudiante->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="grupo_id">Grupo</label>
            <select name="grupo_id" id="grupo_id" class="form-control">
                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->id }}" {{ $asistencia->grupo_id == $grupo->id ? 'selected' : '' }}>{{ $grupo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $asistencia->fecha }}">
        </div>
        <div class="form-group">
            <label for="hora_entrada">Hora Entrada</label>
            <input type="time" name="hora_entrada" id="hora_entrada" class="form-control" value="{{ $asistencia->hora_entrada }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
