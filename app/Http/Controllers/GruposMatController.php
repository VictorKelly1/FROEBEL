<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\GruposMateria;
use App\Models\Materia;
use App\Models\Vgrupos;
use App\Models\VgruposMaterias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GruposMatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Materias = Materia::All();
        $Grupos = Vgrupos::where('ClavePeriodo', 'LIKE', '%')
            ->get()
            ->filter(function ($grupo) {
                // Extraemos los primeros 4 dígitos y creamos el año académico
                $year = substr($grupo->ClavePeriodo, 0, 4);
                $startYear = substr($year, 0, 2);
                $endYear = substr($year, 2, 2);
                return '20' . $startYear . '20' . $endYear; // Convertimos a formato completo (ej: 20232024)
            })
            ->sortByDesc(function ($grupo) {
                $year = substr($grupo->ClavePeriodo, 0, 4);
                $startYear = substr($year, 0, 2);
                $endYear = substr($year, 2, 2);
                return '20' . $startYear . '20' . $endYear;
            })
            ->groupBy(function ($grupo) {
                return substr($grupo->ClavePeriodo, 0, 4);
            })
            ->first();
        //
        $GrupMat = VgruposMaterias::orderByRaw('SUBSTRING(ClavePeriodo, 1, 4) DESC')
            ->paginate(50);
        //
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
        DB::beginTransaction();
        try {
            // Eliminar registros relacionados en calificaciones
            Calificacion::where('idGruposMaterias', $GM->idGrupoMateria)->delete();

            // Eliminar el registro principal
            $GM->delete();

            DB::commit();
            return redirect()->route('ListaGruposMaterias')->with('success', 'Registro eliminado correctamente.');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al eliminar el registro: ' . $e->getMessage());
        }
    }
}
