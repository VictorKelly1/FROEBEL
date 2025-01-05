<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\VInasistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InasistenciasController extends Controller
{
    /* 
        Se obtiene una lista con todos las Inasistencias 
    */
    public function index()
    {

        $Inasistencias = VInasistencias::paginate(50);
        return view('director.ConsultasInasist', ['Inasistencias' => $Inasistencias]);
    }

    public function inasistenciasParticulares(String $id)
    {
        $idPersona = Alumno::where('idAlumno', $id)->value('idPersona');
        $Inasistencias = DB::table('vInasistencias')
            ->where('idPersona', $idPersona)
            ->paginate(50);

        return view('dinamicas.InasistPersonal', ['Inasistencias' => $Inasistencias]);
    }
}
