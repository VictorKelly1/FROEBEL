<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vvestimenta;
use Illuminate\Http\Request;

class VestimentaController extends Controller
{
    /* 
        Se obtiene una lista con todos el Historial de cumplimieto con el uniforme de los empleados 
    */
    public function index()
    {
        $Vestimentas = Vvestimenta::All();
        return view('director.ConsultasVestim', ['Vestimentas' => $Vestimentas]);
    }
}
