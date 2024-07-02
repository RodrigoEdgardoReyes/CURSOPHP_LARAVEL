<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencias = Asistencia::with(['estudiante', 'grupo'])->paginate(10);
        return view('asistencias.index', compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiantes = \App\Models\Estudiante::all();
        $grupos = \App\Models\Grupo::all();
        return view('asistencias.create', compact('estudiantes', 'grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'grupo_id' => 'required|exists:grupos,id',
            'fecha' => 'required|date',
            'hora_entrada' => 'required|date_format:H:i',
        ]);

        Asistencia::create([
            'estudiante_id' => $request->estudiante_id,
            'grupo_id' => $request->grupo_id,
            'fecha' => $request->fecha,
            'hora_entrada' => $request->hora_entrada,
        ]);

        return redirect()->route('asistencias.index')->with('success', 'Asistencia registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistencia $asistencia)
    {
        return view('asistencias.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia $asistencia)
    {
        $estudiantes = \App\Models\Estudiante::all();
        $grupos = \App\Models\Grupo::all();
        return view('asistencias.edit', compact('asistencia', 'estudiantes', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'grupo_id' => 'required|exists:grupos,id',
            'fecha' => 'required|date',
            'hora_entrada' => 'required|date_format:H:i',
        ]);

        $asistencia->update([
            'estudiante_id' => $request->estudiante_id,
            'grupo_id' => $request->grupo_id,
            'fecha' => $request->fecha,
            'hora_entrada' => $request->hora_entrada,
        ]);

        return redirect()->route('asistencias.index')->with('success', 'Asistencia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencia $asistencia)
    {
        $asistencia->delete();
        return redirect()->route('asistencias.index')->with('success', 'Asistencia eliminada correctamente.');
    }
}
