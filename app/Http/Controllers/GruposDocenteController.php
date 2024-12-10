<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GruposDocente;
use App\Models\VDocente;
use App\Models\Vgrupos;
use App\Models\VgruposDocentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GruposDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Docentes = VDocente::All();
        $Grupos = Vgrupos::All();
        $GrupDocentes = VgruposDocentes::where('Estado', 'Activo')->get();
        return view(
            'director.AsigGrupDocen',
            [
                'Docentes' => $Docentes,
                'GrupDocen' => $GrupDocentes,
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

            $GrupDocen = new GruposDocente();

            $GrupDocen->idDocente = $request->input('idDocente');
            $GrupDocen->idGrupo = $request->input('idGrupo');

            $GrupDocen->save();

            // Confirmar transacción
            DB::commit();

            return back()->with('success', 'El docente se asignó al grupo correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al asignar el Alumno: ' . $e->getMessage());
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
    public function destroy(GruposDocente $GD)
    {
        $GD->delete();
        // Redirige a alguna vista o devuelve un mensaje de éxito
        return redirect()->route('ListaGruposDocentes')->with('success', 'Registro eliminado correctamente.');
    }
}
