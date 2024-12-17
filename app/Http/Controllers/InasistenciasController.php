<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VInasistencias;
use Illuminate\Http\Request;

class InasistenciasController extends Controller
{
    /* 
        Se obtiene una lista con todos las Inasistencias 
    */
    public function index()
    {

        $Inasistencias = VInasistencias::All();
        return view('director.ConsultasInasist', ['Inasistencias' => $Inasistencias]);
    }
}
