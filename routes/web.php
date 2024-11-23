<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\Api\pruebasController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



//ruta para Preubas
Route::view('/prueba', 'director.AsigGrupAlum');
//
Route::controller(pruebasController::class)->group(function () {
    Route::get('/GA', 'index');
});

//Rutas para los controladores del alumno
Route::controller(AlumnoController::class)->group(function () {
    Route::get('/Alumnos', 'index');                    //Obtienes una lista con todos los alumnos
    Route::get('/VistaRegistrarAlumno', 'create');      //Te lleva a la vista para registar
    Route::post('/Registrar', 'store');                  //Llama la funcion para guardar el alumno
    Route::get('/VistaEditarAlumno/{id}', 'edit');      //Te lleva a la vista dinamica para editar  
    Route::post('/Editar/{id}', 'update');               //Llama a la funcion para editar los datos 
});










//Rutas autorizacion
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
