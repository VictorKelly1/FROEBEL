<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\VentaConfirmacion;
//
use App\Models\Concepto;
use App\Models\DescTransaccion;
use App\Models\Descuento;
use App\Models\Periodo;
use App\Models\Transaccion;
use App\Models\VdescTransacciones;
use App\Models\Vtransacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VentasControllers extends Controller
{
    /**
      vista con las ventas realizadas para la interfaz ConsultasVentas
     */
    public function index()
    {
        //
        //Ventas que no se les aplico descuento
        $Ventas = VTransacciones::where('TipoTransaccion', 'Venta')
            ->orderBy('vTransacciones.created_at', 'desc')
            ->paginate(10000);
        //pagos que se les aplico descuento
        $VentasDesc = VdescTransacciones::where('TipoTransaccion', 'Venta')
            ->paginate(50);
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
     
     */
    public function create()
    {
        //
        $Conceptos = Concepto::where('Para', 'Ventas')->get();
        //
        $Periodos = Periodo::where('Tipo', '!=', 'Colegiatura')
            ->where('Tipo', '!=', 'Inscripción')
            ->where('Tipo', '!=', 'Verano')
            ->where('Tipo', '!=', 'Extraescolar')
            ->get();
        //
        $Desc = Descuento::where('Para', 'Ventas')->get();
        //
        return view(
            'director.RegisVenta',
            [
                'Periodos' => $Periodos,
                'Conceptos' => $Conceptos,
                'Descuentos' => $Desc,
            ]
        );
    }

    /**
        Guarda la transaccion de tipo venta y envia un email de confirmacion
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
            $Venta = new Transaccion();

            $Venta->Cantidad = $request->input('Cantidad');
            $Venta->Tipo = 'Venta';
            $Venta->MetodoPago = $request->input('MetodoPago');

            // Asignar idConcepto desde la tabla Conceptos donde coincide idConcepto elegido en front
            $Venta->idConcepto = $request->input('idConcepto');

            $Periodo = new Periodo();

            $Periodo->Clave = 'Venta-' . now()->format('YmdHis');
            $Periodo->FechaInicio = now()->format('Ymd');
            $Periodo->FechaFin = now()->format('Ymd');
            $Periodo->Tipo = 'Venta';

            $Periodo->save();

            $Venta->idPeriodo = $Periodo->idPeriodo;

            $Venta->idPersona = Session::get('idPersona'); //id persona de sesion

            $Venta->Monto = $request->input('Monto') * $request->input('Cantidad');

            //si el valor de $request->input('CuentaRecibido') es null. Si lo es, asigna 'N/A'.
            $Venta->CuentaRecibido = $request->input('CuentaRecibido') ?? 'N/A'; //

            $Venta->save();

            // Si DescTransaccion tiene algún valor
            if ($request->input('idDescuento')) {
                //

                $VentaDescuento = new DescTransaccion();

                $VentaDescuento->idDescuento = $request->input('idDescuento');
                //id de la transaccion recien registrada
                $idVenta = $Venta->idTransaccion;
                $VentaDescuento->idTransaccion = $idVenta;
                //

                //calculo del nuevo monto
                $Monto = $request->input('Monto') * $request->input('Cantidad');
                //
                $Descuento = DB::table('Descuentos')->where('idDescuento', $VentaDescuento->idDescuento)->first();
                $TipoDesc = $Descuento->Tipo;
                $CantidadDesc = $Descuento->Monto;

                if ($TipoDesc == 'Porcentual') {
                    // Calcular descuento porcentual
                    $Monto -= ($Monto * ($CantidadDesc / 100));
                } else if ($TipoDesc == 'Fijo') {
                    // Calcular descuento fijo
                    $Monto -= $CantidadDesc;
                }
                $VentaDescuento->save();
                $Venta->Monto = $Monto; //se actualiza el nuevo monto a la transaccion
                //se gurada todo en su respectiva tabla

                $Venta->save();
            }

            //Confirmar transacción
            DB::commit();

            return back()->with('success', 'La venta se registró correctamente, el monto a cobrar es.'
                . $Venta->Monto);
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el pago: ' . $e->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }
}
