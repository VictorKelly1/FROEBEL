<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VInasistencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ModuloDocenteController extends Controller
{

    public function index()
    {
        return view('docente.Menu');
    }

    public function vistaComunicado()
    {
        return view('docente.Comunicado');
    }

    public function vistaComunicadoParticular(String $id)
    {
        return view('docenteDinamicas.Comunicado');
    }

    public function vistaHorario()
    {
        return view('docente.Horarios');
    }

    public function verGrupo(String $id)
    {

        $AlumnosDelGrupo = DB::table('vGruposAlumnos')
            ->where('idGrupo', $id)
            ->get();

        return view('docenteDinamicas.GrupoDocente', ['AlumnosDelGrupo' => $AlumnosDelGrupo]);
    }

    public function vistaInasistencias()
    {
        $id = Session::get('idPersona');
        $Inasist = VInasistencias::where('idPersona', $id);
        return view('docente.MisInasist', ['Inasistencias' => $Inasist]);
    }

    public function vistaCalificacion(String $id)
    {
        return view('docenteDinamicas.RegisCalif');
    }

    public function registrarCalificacion(String $id)
    {
        return 'Pendiente de funcionamiento';
    }

    public function listaRegistrarInasistencia()
    {
        return view('docente.RegisInasist');
    }
}
