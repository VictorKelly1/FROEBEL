<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebasController;

Route::get('/', function () {
    return view('welcome');
});

//Ruta de Prueba para obtener datos
Route::get('/prueba', [PruebasController::class, 'ObtenerDatos']);


//vista bajas para consultar y editar
//Asignar Tutor y que muestra datos del tutor para edicion y consulta
//asignacion y consulta de contactos (tutores y tal ves los demas)

//vistas de entidades debiles inasist