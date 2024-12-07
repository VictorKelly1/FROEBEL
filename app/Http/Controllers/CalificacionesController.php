<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\VAlumno;
use App\Models\Vcalificaciones;
use Illuminate\Http\Request;

class CalificacionesController extends Controller
{
    /**
     Pendiente de analizar
     */
    public function index()
    {
        $Calificaciones = Calificacion::All();
        $Alumnos = VAlumno::All();
        return view(
            'docente.ConsultasCalificaciones',
            [
                'Calificaciones' => $Calificaciones,
                'Alumnos' => $Alumnos,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Alumno)
    {
        //se obtiene la tupla de la tabla calificaciones donde la id alumno es igual a $Alumno(id del alumno seleccionado)
        $Calificaciones = Vcalificaciones::where('idAlumno', $Alumno)->get();
        return view('dinamicas.MostrarCalificaciones', ['Calificaciones' => $Calificaciones]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
