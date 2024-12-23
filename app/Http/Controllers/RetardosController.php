<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vretardos;
use Illuminate\Http\Request;

class RetardosController extends Controller
{
    /* 
        Se obtiene una lista con todos el Historial de Retardos de los empleados 
    */
    public function index()
    {
        $Retardos = Vretardos::paginate(50);
        return view('director.ConsultasInasist', ['Retardos' => $Retardos]);
    }
}
