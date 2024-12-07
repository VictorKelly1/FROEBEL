<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fijo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FijosController extends Controller
{
    /* 
    Se obtiene una lista con el inventario de activos fijos 
    */
    public function index()
    {
        $Fijos = Fijo::All();
        return view('director.ConsultasFijos', ['Fijos' => $Fijos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('director.RegisFijo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NombreArticulo' => 'required|string',
            'Categoria' => 'required|string',
            'Cantidad' => 'required',
        ]);

        DB::beginTransaction();

        try {
            //Objeto Fijo
            $Fijo = new Fijo();

            $Fijo->NombreArticulo = $request->input('Nombre');
            $Fijo->Categoria = $request->input('Categoria');
            $Fijo->Cantidad = $request->input('Cantidad');

            $Fijo->save();

            //confirmar transaccion
            DB::commit();

            return view('director.RegisFijo');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Articulo: ' . $e->getMessage());
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
    public function edit(Fijo $id)
    {
        if (!$id) {
            return response()->json(['error' => 'Articulo no encontrado'], 404);
        } else {
            return view('dinamicas.EditarFijo', ['Fijos' => $id]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'NombreArticulo' => 'required|string',
            'Categoria' => 'required|string',
            'Cantidad' => 'required',
        ]);

        DB::beginTransaction();

        try {
            //Objeto Articulo Fijo
            $Fijo = Fijo::findOrFail($id);

            $Fijo->NombreArticulo = $request->input('Nombre');
            $Fijo->Categoria = $request->input('Categoria');
            $Fijo->Cantidad = $request->input('Cantidad');

            $Fijo->save();

            //confirmar transaccion
            DB::commit();

            return view('director.RegisFijo');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el articulo: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
