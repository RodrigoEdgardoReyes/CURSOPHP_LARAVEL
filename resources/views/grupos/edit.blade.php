@extends('layouts.app')

@section('content')
    <h1>Actualizar Grupo</h1>
    <form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
        {{-- Sirve para aplicar un poco de seguridad --}}
        @csrf

        <div class="row">
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $grupo->nombre }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control">{{ $grupo->descripcion}}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Guardar Cambios</button> |
                <a href="{{ route('grupos.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
@endsection
