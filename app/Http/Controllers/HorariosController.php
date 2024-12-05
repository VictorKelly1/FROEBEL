<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Vgrupos;
use App\Models\VgruposMaterias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Materias = Materia::All();
        $Grupos = Vgrupos::All();
        $GrupMat = VgruposMaterias::All();
        return view(
            'director.AsigGrupAlum',
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
    public function store(Request $request, Materia $Materia, Grupo $Grupo)
    {
        //
        DB::beginTransaction();
        try {
            // $idMateria = Materia::where('Matricula', $Materia->Matricula)->value('id');

            // // Obtener el ID del grupo donde los valores coincidan
            // $idGrupo = Vgrupos::where([
            //     ['NombreGrado', $Grupo->NombreGrado],
            //     ['NivelAcademico', $Grupo->NivelAcademico],
            //     ['Paquete', $Grupo->Paquete],
            // ])->value('id');

            // $GrupAlum = new GruposMateria();

            // $GrupAlum->idAlumno = $idAlumno();
            // $GrupAlum->idGrupo = $idGrupo();

            // $GrupAlum->save();

            // Confirmar transacción
            DB::commit();

            return back()->with('success', 'La materia se asignó al grupo correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

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
    public function destroy(string $id)
    {
        //
    }
}
