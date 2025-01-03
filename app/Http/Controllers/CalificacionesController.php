<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vcalificaciones;


class CalificacionesController extends Controller
{

    public function show(string $Alumno)
    {
        $Calificaciones = Vcalificaciones::where('idAlumno', $Alumno)
            ->orderByRaw('SUBSTRING(ClavePeriodo, 1, 4) DESC')
            ->get();

        return view('dinamicas.VistaCalificaciones', ['Calificaciones' => $Calificaciones]);
    }
}
