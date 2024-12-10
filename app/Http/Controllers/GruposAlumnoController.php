<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\GruposAlumno;
use App\Models\VAlumno;
use App\Models\Vgrupos;
use App\Models\VgruposAlumnos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GruposAlumnoController extends Controller
{

    public function index()
    {
        /* 
        Se obtiene una lista con todos los alumnos activos
        */
        $Alumnos = VAlumno::where('Estado', 'Activo')->get();
        $Grupos = Vgrupos::All();
        $GrupAlum = VgruposAlumnos::where('Estado', 'Activo')->get();
        return view(
            'director.AsigGrupAlum',
            [
                'Alumnos' => $Alumnos,
                'GrupAlum' => $GrupAlum,
                'Grupos' => $Grupos,
            ]
        );
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        DB::beginTransaction();
        try {

            $GrupAlum = new GruposAlumno();

            $GrupAlum->idAlumno = $request->input('idAlumno');
            $GrupAlum->idGrupo = $request->input('idGrupo');

            $GrupAlum->save();

            // Confirmar transacción
            DB::commit();

            return back()->with('success', 'El alumno se asignó al grupo correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al asignar el Alumno: ' . $e->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //No se usara esta funcion porque seria mas practico eliminar y registrar de nuevo
    }


    public function destroy(GruposAlumno $GA)
    {
        // Elimina el registro de la tabla GruposAlumnos
        $GA->delete();
        // Redirige a alguna vista o devuelve un mensaje de éxito
        return redirect()->route('ListaGruposAlumnos')->with('success', 'Registro eliminado correctamente.');
    }
}
