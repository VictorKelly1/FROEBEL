<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vplaneaciones;
use Illuminate\Http\Request;

class PlaneacionesController extends Controller
{
    /* 
        Se obtiene una lista con todos el Historial de Planeaciones de los docentes 
    */
    public function index()
    {

        $Planeaciones = Vplaneaciones::All();
        return view('director.ConsultasInasist', ['Planeaciones' => $Planeaciones]);
    }
}
