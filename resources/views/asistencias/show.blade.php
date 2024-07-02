@extends('layouts.asistencia')

@section('content')
    <h1>Detalles de Asistencia</h1>
    <p>Estudiante: {{ $asistencia->estudiante->nombre }}</p>
    <p>Grupo: {{ $asistencia->grupo->nombre }}</p>
    <p>Fecha: {{ $asistencia->fecha }}</p>
    <p>Hora Entrada: {{ $asistencia->hora_entrada }}</p>
    <a href="{{ route('asistencias.index') }}" class="btn btn-primary">Volver</a>
@endsection
