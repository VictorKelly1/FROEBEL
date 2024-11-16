<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PruebasController extends Controller
{
    //
    public function obtenerDatos()
    {
        // Consulta los datos desde la vista
        $datos = DB::table('vAlumnosRelaciones')->get();

        return $datos;
    }
}
