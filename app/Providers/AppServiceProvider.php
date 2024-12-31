<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
//
use App\Models\GruposAlumno;
use App\Observers\GruposAlumnoObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
        //Actualiza la cantidad de alumnos por grupo cada vez que hay una insercion en la tabla GruposAlumnos
        GruposAlumno::observe(GruposAlumnoObserver::class);
        //

    }
}
