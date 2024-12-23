<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GruposMateria;
use App\Models\Materia;
use App\Models\Vgrupos;
use App\Models\VgruposMaterias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GruposMatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Materias = Materia::All();
        $Grupos = Vgrupos::All();
        $GrupMat = VgruposMaterias::paginate(50);
        return view(
            'director.AsigGrupMat',
            [
                'Materias' => $Materias,
                'GrupMat' => $GrupMat,
                'Grupos' => $Grupos,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $GrupMat = new GruposMateria();

            $GrupMat->idMateria = $request->input('idMateria');
            $GrupMat->idGrupo = $request->input('idGrupo');

            $GrupMat->save();

            // Confirmar transacción
            DB::commit();

            return back()->with('success', 'La materia se asignó al grupo correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();
            return 'error';
            return redirect()->back()->with('error', 'Error al asignar la materia: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GruposMateria $GM)
    {
        // Elimina el registro de la tabla GruposMaterias
        $GM->delete();
        // Redirige a alguna vista o devuelve un mensaje de éxito
        return redirect()->route('ListaGruposMaterias')->with('success', 'Registro eliminado correctamente.');
    }
}
