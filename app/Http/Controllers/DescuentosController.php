<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Descuento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescuentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Descuentos = Descuento::paginate(50);
        return view('director.RegisDescuentos', ['Descuentos' => $Descuentos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Tipo' => 'required|string',
            'Monto' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            //Objeto concepto
            $Descuento = new Descuento();

            $Descuento->Nombre = $request->input('Nombre');
            $Descuento->Tipo = $request->input('Tipo');
            $Descuento->Para = $request->input('Para');
            $Descuento->Monto = $request->input('Monto');

            $Descuento->save();

            //confirmar transaccion
            DB::commit();

            return view('director.ConsultasDesc');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el descuento: ' . $e->getMessage());
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
    public function edit(Descuento $id)
    {
        if (!$id) {
            return view('dinamicas.EditarDesc', ['Descuento' => $id]);
        } else {
            return response()->json(['error' => 'Descuento no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Tipo' => 'required|string',
            'Monto' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            //Objeto Descuento
            $Descuento = Descuento::findOrFail($id);

            $Descuento->Nombre = $request->input('Nombre');
            $Descuento->Tipo = $request->input('Tipo');
            $Descuento->Descripcion = $request->input('Tipo');
            $Descuento->Monto = $request->input('Monto');

            $Descuento->save();

            //confirmar transaccion
            DB::commit();

            return redirect()->route('ListaDescuantos')->with('success', 'Registro actualizado con exito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el descuento: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Descuento $Descuento)
    {
        $Descuento->delete();
        // Redirige a alguna vista o devuelve un mensaje de éxito
        return redirect()->route('director.ListaDesc')->with('success', 'Registro eliminado con correctamente.');
    }
}
