<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Concepto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConceptosController extends Controller
{
    /* 
    
    */
    public function index()
    {
        //
    }

    /*
    Regresa la vista para registrar un concepto
    */
    public function create()
    {
        $Conceptos = Concepto::paginate(50);
        return view('director.RegisConceptos', ['Conceptos' => $Conceptos]);
    }

    /*Almacena un concepto */
    public function store(Request $request)
    {

        $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            //Objeto concepto
            $Concepto = new Concepto();

            $Concepto->Nombre = $request->input('Nombre');
            $Concepto->Descripcion = $request->input('Descripcion');
            $Concepto->Para = $request->input('Para');

            $Concepto->save();

            //confirmar transaccion
            DB::commit();

            return back()->with('success', 'El concepto se registró correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el concepto: ' . $e->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }

    /*regresa vista para edicion de conceptos */
    public function edit(Concepto $id)
    {
        if (!$id) {
            return response()->json(['error' => 'Concepto no encontrado'], 404);
        } else {
            return view('dinamicas.EditarConcepto', ['Concepto' => $id]);
        }
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            //Objeto concepto
            $Concepto = Concepto::findOrFail($id);

            $Concepto->Nombre = $request->input('Nombre');
            $Concepto->Descripcion = $request->input('Descripcion');

            $Concepto->save();

            //confirmar transaccion
            DB::commit();

            return redirect()->route('ListaConceptos')->with('success', 'Registro actualizado con exito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el concepto: ' . $e->getMessage());
        }
    }

    // Elimina el registro de la tabla Conceptos
    public function destroy(Concepto $concepto)
    {

        $concepto->delete();
        // Redirige a alguna vista o devuelve un mensaje de éxito
        return redirect()->route('ListaConceptos')->with('success', 'Registro eliminado con correctamente.');
    }
}
