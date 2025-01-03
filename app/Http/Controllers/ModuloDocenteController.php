<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function vistaHorario()
    {
        return view('docente.Horarios');
    }

    public function vistaInasistencias()
    {
        return view('docente.MisInasist');
    }

    public function vistaCalificacion()
    {
        return view('docente.RegisCalif');
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
