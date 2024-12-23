<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VDocente;
use App\Models\Vtransacciones;
use Illuminate\Http\Request;

class NominasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Nominas = Vtransacciones::where('TipoTransaccion', 'Nomina')
            ->where('NombreConcepto', 'Nomina')
            ->paginate(50);


        return view(
            'director.ConsultasNominas',
            [
                'Nominas' => $Nominas,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener el alumno activo
        $Docentes = VDocente::where('Estado', 'Activo')->get();

        // Pasar los datos a la vista
        return view(
            'dinamicas.RegisNominas',
            [
                'Docentes' => $Docentes,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
