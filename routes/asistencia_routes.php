<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;

Route::group(['prefix' => 'asistencias', 'middleware' => 'auth_estudiantes'], function () {
    Route::get('/', [AsistenciaController::class, 'index'])->name('asistencias.index');
    Route::get('/create', [AsistenciaController::class, 'create'])->name('asistencias.create');
    Route::post('/store', [AsistenciaController::class, 'store'])->name('asistencias.store');
    Route::get('/show/{asistencia}', [AsistenciaController::class, 'show'])->name('asistencias.show');
    Route::get('/edit/{asistencia}', [AsistenciaController::class, 'edit'])->name('asistencias.edit');
    Route::put('/update/{asistencia}', [AsistenciaController::class, 'update'])->name('asistencias.update');
    Route::delete('/destroy/{asistencia}', [AsistenciaController::class, 'destroy'])->name('asistencias.destroy');
});


// Rutas para el inicio de sesión y cierre de sesión
Route::get('asistencias/login', [AsistenciaController::class, 'showLoginForm'])->name('asistencias.showLoginForm');
Route::post('asistencias/login', [AsistenciaController::class, 'login'])->name('asistencias.login');
Route::get('asistencias/logout', [AsistenciaController::class, 'logout'])->name('asistencias.logout');
