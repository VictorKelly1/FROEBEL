<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VdescTransacciones;
use App\Models\Vtransacciones;
use Illuminate\Http\Request;

class VentasControllers extends Controller
{
    /**
      vista con las ventas realizadas para la interfaz ConsultasVentas
     */
    public function index()
    {
        //
        //Ventas que no se les aplico descuento
        $Ventas = Vtransacciones::leftJoin('VdescTransacciones', function ($join) {
            $join->on('vTransacciones.idTransaccion', '=', 'VdescTransacciones.idTransaccion');
        })
            ->where('vTransacciones.TipoTransaccion', 'Venta')
            ->whereNull('VdescTransacciones.idTransaccion')
            ->select('vTransacciones.*')
            ->get();
        //pagos que se les aplico descuento
        $VentasDesc = VdescTransacciones::where('TipoTransaccion', 'Venta')
            ->get();
        //

        return view(
            'director.ConsultasVentas',
            [
                'Ventas' => $Ventas,
                'VentasDesc' => $VentasDesc,
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
