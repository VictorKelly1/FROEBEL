<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Concepto;
use App\Models\Descuento;
use App\Models\Periodo;
use App\Models\VdescTransacciones;
use App\Models\Vtransacciones;
use Illuminate\Http\Request;

class ComprasControllers extends Controller
{
    /**
     regresa la vista con todas las compras realizadas
     */
    public function index()
    {
        //Compras que no se les aplico descuento
        $Compras = VTransacciones::where('TipoTransaccion', 'Compra')
            ->get();
        //pagos que se les aplico descuento
        $ComprasDesc = VdescTransacciones::where('TipoTransaccion', 'Compra')
            ->get();
        //

        return view(
            'director.ConsultasCompras',
            [
                'Compras' => $Compras,
                'ComprasDesc' => $ComprasDesc,
            ]
        );
    }

    /**
        Regresa la vista para hacer el registro de una compra o gasto de la institucion 
     */
    public function create()
    {
        // Obtener los descuentos
        $Desc = Descuento::where('Para', 'Compra')->get();

        $Conceptos = Concepto::where('Para', 'Compra')->get();

        //esto deveulve los peridos pendientes por pargar de un alumno
        $Periodos = Periodo::where('Tipo', 'Compra')->get();


        // Pasar los datos a la vista
        return view(
            'dinamicas.RegisPago',
            [
                'Periodos' => $Periodos,
                'Conceptos' => $Conceptos,
                'Descuentos' => $Desc,
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
