<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use App\Models\Persona;
use App\Models\VContactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Personas = Persona::All();
        $Contactos = VContactos::All();
        return view(
            'director.Contacto',
            [
                'Personas' => $Personas,
                'Contactos' => $Contactos,
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
        //
        DB::beginTransaction();
        try {

            $Contacto = new Contacto();

            $Contacto->TipoContacto = $request->input('TipoContacto');
            $Contacto->ValorContacto = $request->input('ValorContacto');
            $Contacto->idReceptor = $request->input('idPersona');

            $Contacto->save();

            // Confirmar transacción
            DB::commit();

            return back()->with('success', 'Contacto asigando correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al asignar el contacto: ' . $e->getMessage());
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
