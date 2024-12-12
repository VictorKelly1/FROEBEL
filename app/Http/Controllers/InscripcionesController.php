<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VdescTransacciones;
use App\Models\Vtransacciones;
use Illuminate\Http\Request;

class InscripcionesController extends Controller
{
    /**

     */
    public function index()
    {
        //pagos que no se les aplico descuento
        $Pagos = vTransacciones::leftJoin('VdescTransacciones', function ($join) {
            $join->on('vTransacciones.idTransaccion', '=', 'VdescTransacciones.idTransaccion');
        })
            ->where('vTransacciones.TipoTransaccion', 'Pagos')
            ->where('vTransacciones.NombreConcepto', 'Inscripcion')
            ->whereNull('VdescTransacciones.idTransaccion')
            ->select('vTransacciones.*')
            ->get();
        //pagos que se les aplico descuento
        $PagosDesc = VdescTransacciones::where('TipoTransaccion', 'Pagos')
            ->where('NombreConcepto', 'Inscripcion')
            ->get();
        //

        return view(
            'director.ConsultasColeg',
            [
                'Inscripciones' => $Pagos,
                'InscripcionDesc' => $PagosDesc,
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
