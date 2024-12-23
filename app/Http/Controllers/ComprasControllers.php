<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Concepto;
use App\Models\Descuento;
use App\Models\Periodo;
use App\Models\VdescTransacciones;
use App\Models\Vtransacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasControllers extends Controller
{
    /**
     regresa la vista con todas las compras realizadas
     */
    public function index()
    {
        //Compras que no se les aplico descuento
        $Compras = VTransacciones::where('TipoTransaccion', 'Compra')
            ->paginate(50);
        //pagos que se les aplico descuento
        $ComprasDesc = VdescTransacciones::where('TipoTransaccion', 'Compra')
            ->paginate(50);
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
            'director.RegisCompras',
            [
                'Periodos' => $Periodos,
                'Conceptos' => $Conceptos,
                'Descuentos' => $Desc,
            ]
        );
    }

    /**
     * Store a newly created resource in storage. Froebelpass1
     */
    public function store(Request $request)
    {
        //     $request->validate([
        //         'MetodoPago' => 'required',
        //         'Monto' => 'required',
        //     ]);

        //     DB::beginTransaction();

        //     try {
        //         // Objeto Pago
        //         $Pago = new Transaccion();

        //         $Pago->Cantidad = 1;
        //         $Pago->Tipo = 'Pago';
        //         $Pago->MetodoPago = $request->input('MetodoPago');

        //         // Asignar idConcepto desde la tabla Conceptos donde coincide idConcepto elegido en front
        //         $Pago->idConcepto = $request->input('idConcepto');

        //         // Asignar idPeriodo desde la tabla Periodos donde coincide Clave elegida en front
        //         $idPeriodo = Periodo::where('idPeriodo', $request->input('idPeriodo'))->first()->idPeriodo;
        //         $Pago->idPeriodo = $idPeriodo;

        //         // Asignar idPersona desde la tabla VAlumnos donde coincide la matrícula con la enviada desde front
        //         $idPersona = VAlumno::where('Matricula', $request->input('idAlumno'))->first()->idPersona;
        //         $Pago->idPersona = $idPersona;

        //         $Pago->Monto = $request->input('Monto');

        //         //si el valor de $request->input('CuentaRecibido') es null. Si lo es, asigna 'N/A'.
        //         $Pago->CuentaRecibido = $request->input('CuentaRecibido') ?? 'N/A'; //

        //         $Pago->save();
        //         // Si DescTransaccion tiene algún valor

        //         //Confirmar transacción
        //         DB::commit();

        //         return back()->with('success', 'El pago se registró correctamente, el monto a cobrar es.'
        //             . $Pago->Monto);
        //     } catch (\Exception $e) {
        //         // Revertir transacción si hay un error
        //         DB::rollBack();

        //         return redirect()->back()->with('error', 'Error al registrar el pago: ' . $e->getMessage());
        // }
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
