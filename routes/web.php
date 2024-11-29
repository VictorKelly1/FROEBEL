<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\Api\pruebasController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\GruposAlumnoController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TutoresController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



//ruta para Preubas
Route::view('/prueba', 'director.RegisAlum')->name('prueba');
//
Route::controller(pruebasController::class)->group(function () {
    Route::get('/GA', 'index');
});

//Rutas con los controladores del alumno
Route::controller(AlumnoController::class)->group(function () {

    Route::get('/Alumnos', 'index')->name('ListaAlumnos');
    Route::get('/VistaRegistrarAlumno', 'create')->name('VistaRegistrarAlumno');
    Route::post('/RegistrarAlumno', 'store')->name('RegistrarAlumno');
    Route::get('/VistaEditarAlumno/{id}', 'edit')->name('VistaEditarAlumno');
    Route::post('/EditarAlumno/{id}', 'update')->name('EditarAlumno');
});

//Rutas con los controladores de Docentes
Route::controller(DocenteController::class)->group(function () {
    Route::get('/Docentes', 'index')->name('ListaDocentes');
    Route::get('/VistaRegistrarDocente', 'create')->name('VistaRegistrarDocente');
    Route::post('/RegistrarDocente', 'store')->name('RegistrarDocente');
    Route::get('/VistaEditarDocente/{id}', 'edit')->name('VistaEditarDocente');
    Route::post('/EditarDocente/{id}', 'update')->name('EditarDocente');
});

//Rutas con los controladores de tutores
Route::controller(TutoresController::class)->group(function () {
    Route::get('/Tutores', 'index')->name('ListaTutores');
    Route::get('/VistaRegistrarTutor', 'create')->name('VistaRegistrarTutor');
    Route::post('/RegistrarTutor/{id}', 'store')->name('RegistrarTutor');
    Route::get('/VistaEditarTutor/{id}', 'edit')->name('VistaEditarTutor');
    Route::post('/EditarTutor/{id}', 'update')->name('EditarTutor');
});

//Rutas con los controladores de grupos
Route::controller(GruposController::class)->group(function () {
    Route::get('/Grupos', 'index')->name('ListaGrupos');
    Route::get('/VistaRegistrarGrupo', 'create')->name('VistaRegistrarGrupo');
    Route::post('/RegistrarGrupo', 'store')->name('RegistrarGrupo');
    Route::get('/VistaEditarGrupo/{id}', 'edit')->name('VistaEditarGrupo');
    Route::post('/EditarGrupo/{id}', 'update')->name('EditarGrupo');
});

//Rutas con los controladores de alumnos grupos
Route::controller(GruposAlumnoController::class)->group(function () {
    Route::get('/GruposAlumnos', 'index')->name('ListaGruposAlumnos');
    Route::post('/AsignarGrupAlum/{idAlumno}/{idGrupo}', 'store')->name('AsignarGrupAlum');

});










//Rutas autorizacion
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
