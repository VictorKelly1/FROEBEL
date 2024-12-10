<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\MaterialesIntendentes as ModelsMaterialesIntendentes;
use App\Models\VIntendente;
use App\Models\VmaterialesIntendentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialesIntendentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Intendentes = VIntendente::All();
        $Materiales = Material::All();
        $DocentesIntendentes = VmaterialesIntendentes::All();
        return view(
            'director.AsigMaterialInten',
            [
                'Intendentes' => $Intendentes,
                'DocentesIntendentes' => $DocentesIntendentes,
                'Materiales' => $Materiales,
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

            $MaterialDocen = new ModelsMaterialesIntendentes();

            $MaterialDocen->idIntendentes = $request->input('idIntendentes');
            $MaterialDocen->idMaterial = $request->input('idMaterial');

            $MaterialDocen->save();

            // Confirmar transacción
            DB::commit();

            return back()->with('success', 'El material se asignó al docente correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al asignar el Material: ' . $e->getMessage());
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
    public function destroy(ModelsMaterialesIntendentes $MI)
    {
        $MI->delete();
        // Redirige a alguna vista o devuelve un mensaje de éxito
        return redirect()->route('ListaMaterialesDocentes')->with('success', 'Registro eliminado correctamente.');
    }
}
