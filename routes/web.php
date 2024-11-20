<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');


});
Route::get('/vdirector', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.vdirector'); // Carga la vista resources/views/about.blade.php
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/asignacionesgrupalum', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.asignacionesgrupalum'); // Carga la vista resources/views/about.blade.php
});
Route::get('/asiggrupdocen', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.asiggrupdocen'); // Carga la vista resources/views/about.blade.php
});
Route::get('/asigmaterial', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.asigmaterial'); // Carga la vista resources/views/about.blade.php
});
Route::get('/registalumn', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.registalumn'); // Carga la vista resources/views/about.blade.php
});
Route::get('/registdocent', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.registdocent'); // Carga la vista resources/views/about.blade.php
});
Route::get('/regisgrupo', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.regisgrupo'); // Carga la vista resources/views/about.blade.php
});
Route::get('/regisdesc', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.regisdesc'); // Carga la vista resources/views/about.blade.php
});
Route::get('/regisconcep', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.regisconcep'); // Carga la vista resources/views/about.blade.php
});
Route::get('/asighorariogrupo', function () {   //asi se valida una vista nombrecarpeta.nombrearchivo
    return view('vdirector.asighorariogrupo'); // Carga la vista resources/views/about.blade.php
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
