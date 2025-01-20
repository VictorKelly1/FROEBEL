<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Concepto;
use App\Models\Descuento;
use App\Models\Periodo;
use App\Models\Transaccion;
use App\Models\VdescTransacciones;
use App\Models\Vtransacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ComprasControllers extends Controller
{
    /**
     regresa la vista con todas las compras realizadas
     */
    public function index()
    {
        //Compras que no se les aplico descuento
        $Compras = VTransacciones::where('TipoTransaccion', 'Compra')
            ->paginate(300);
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

        $Conceptos = Concepto::where('Para', 'Compras')->get();

        //esto deveulve los peridos pendientes por pargar de un alumno
        $Periodos = Periodo::where('Tipo', 'Compra')
            ->whereNot(function ($query) {
                $query->where('clave', 'like', 'Compra%')
                    ->orWhere('clave', 'like', 'Venta%');
            })
            ->get();




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

        $request->validate([
            'MetodoPago' => 'required',
            'Monto' => 'required',
            'Cantidad' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Objeto Venta
            $Compra = new Transaccion();

            $Compra->Cantidad = $request->input('Cantidad');
            $Compra->Tipo = 'Compra';
            $Compra->MetodoPago = $request->input('MetodoPago');

            // Asignar idConcepto desde la tabla Conceptos donde coincide idConcepto elegido en front
            $Compra->idConcepto = $request->input('idConcepto');

            $Periodo = new Periodo();

            $Periodo->Clave = 'Compra-' . now()->format('YmdHis');
            $Periodo->FechaInicio = now()->format('Ymd');
            $Periodo->FechaFin = now()->format('Ymd');
            $Periodo->Tipo = 'Compra';

            $Periodo->save();

            $Compra->idPeriodo = $Periodo->idPeriodo;

            $Compra->idPersona = Session::get('idPersona'); //id persona de sesion

            $Compra->Monto = $request->input('Monto') * $request->input('Cantidad');

            //si el valor de $request->input('CuentaRecibido') es null. Si lo es, asigna 'N/A'.
            $Compra->CuentaRecibido = $request->input('CuentaRecibido') ?? 'N/A'; //

            $Compra->save();

            //Confirmar transacción
            DB::commit();

            return back()->with('success', 'La compra se registró correctamente, el monto a cobrar es.'
                . $Compra->Monto);
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar la compra: ' . $e->getMessage());
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
