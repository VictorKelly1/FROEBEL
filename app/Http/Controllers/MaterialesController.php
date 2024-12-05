<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialesController extends Controller
{
    /* 
    Se obtiene una lista con todos los materiales
    */
    public function index()
    {
        $Materiales = Material::All();
        return view('director.ConsultasMateriales', ['Materiales' => $Materiales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('director.RegisMaterial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NombreMaterial' => 'required|string',
            'UnidadMedida' => 'required|string',
            'Costo' => 'required',
        ]);

        DB::beginTransaction();

        try {
            //Objeto concepto
            $Material = new Material();

            $Material->NombreMaterial = $request->input('NombreMaterial');
            $Material->UnidadMedida = $request->input('UnidadMedida');
            $Material->Cantidad = $request->input('Cantidad');
            $Material->Costo = $request->input('Costo');

            $Material->save();

            //confirmar transaccion
            DB::commit();

            return view('director.RegisMaterial');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Material: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $id)
    {
        if (!$id) {
            return response()->json(['error' => 'Material no encontrado'], 404);
        } else {
            return view('dinamicas.EditarMaterial', ['Material' => $id]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /* */
        $request->validate([
            'NombreMaterial' => 'required|string',
            'UnidadMedida' => 'required|string',
            'Costo' => 'required',
        ]);

        DB::beginTransaction();

        try {
            //Objeto Grupo
            $Material = Material::findOrFail($id);

            $Material->NombreMaterial = $request->input('NombreMaterial');
            $Material->UnidadMedida = $request->input('UnidadMedida');
            $Material->Cantidad = $request->input('Cantidad');
            $Material->Costo = $request->input('Costo');

            $Material->save();

            // Confirmar transacción 
            DB::commit();

            return redirect()->route('ListaMateriales')->with('success', 'Registro actualizado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al actualizar el material: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $Material)
    {
        // Elimina el registro de la tabla GruposAlumnos
        $Material->delete();
        // Redirige a alguna vista o devuelve un mensaje de éxito
        return redirect()->route('director.ConsultasMateriales')->with('success', 'Registro eliminado correctamente.');
    }
}
