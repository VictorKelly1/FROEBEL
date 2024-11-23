<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VgruposAlumnos;
use Illuminate\Http\Request;

class pruebasController extends Controller
{

    public function index()
    {

        $GruposAlumnos = VgruposAlumnos::where('Estado', 'Activo')->get();
        return response()->json($GruposAlumnos);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(VgruposAlumnos $id)
    {
        //
        $GruposAlumnos = VgruposAlumnos::find($id);
        return $GruposAlumnos;
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

    // public function getDatos()
    // {
    //     // Obtener los datos desde la base de datos
    //     $datos = DB::table('vGruposAlumnos')->get();

    //     // Retornar los datos como JSON
    //     return response()->json($datos);
    // }
}
