<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuloAlumnoController extends Controller
{
    /* 
      Menu del Alumno
    */
    public function index()
    {
        return view('alumno.Menu');
    }

    public function calificaciones()
    {
        $idAlumno = session('idAlumno');

        if (!$idAlumno) {
            return response()->json(['error' => 'El idAlumno no está definido en la sesión'], 400);
        }

        // Consultar las calificaciones correspondientes al Alumno
        $Calificaciones = DB::table('vCalificaciones')
            ->where('idAlumno', $idAlumno)
            ->get();

        return view('Alumno.Calificaciones', ['Calificaciones' => $Calificaciones]);
    }

    public function horario()
    {
        return view('alumno.Horario');
    }

    public function inasistencias()
    {
        $idAlumno = session('idAlumno');

        if (!$idAlumno) {
            return response()->json(['error' => 'El idAlumno no está definido en la sesión'], 400);
        }

        // Consultar las Inasistencias correspondientes al Alumno
        $Inasistencias = DB::table('vCalificaciones')
            ->where('idAlumno', $idAlumno)
            ->get();

        return view('Alumno.Inasistencias', ['Inasistencias' => $Inasistencias]);
    }

    public function vistaColegiaturas()
    {
        $Colegiaturas = [];
        return view('Alumno.Colegiaturas', ['Colegiaturas' => $Colegiaturas]);
    }

    public function pagoColegiatura()
    {
        //
    }
}
