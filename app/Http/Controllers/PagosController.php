<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\MailConfirmacion;
use App\Mail\PagoConfirmacion;
use App\Models\Concepto;
use App\Models\DescTransaccion;
use App\Models\Descuento;
use App\Models\Periodo;
use App\Models\Transaccion;
use App\Models\VAlumno;
use App\Models\VdescTransacciones;
use App\Models\Vtransacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PagosController extends Controller
{
    /**
        regresa la vista consultas pagos con los datos de las transacciones que son de tipo pago 
        excepto las de concepto colegiatura (ya se ven en una vista particular)
     */
    public function index()
    {
        //pagos que no se les aplico descuento
        $Pagos = vTransacciones::leftJoin('VdescTransacciones', function ($join) {
            $join->on('vTransacciones.idTransaccion', '=', 'VdescTransacciones.idTransaccion');
        })
            ->where('vTransacciones.TipoTransaccion', 'Pagos')
            ->where('TipoTransaccion', '!=', 'Colegiatura')
            ->whereNull('VdescTransacciones.idTransaccion')
            ->select('vTransacciones.*')
            ->get();
        //pagos que se les aplico descuento
        $PagosDesc = VdescTransacciones::where('TipoTransaccion', 'Pagos')
            ->get();
        //

        return view(
            'director.ConsultasPagos',
            [
                'Pagos' => $Pagos,
                'PagosDesc' => $PagosDesc,
            ]
        );
    }

    /**
     regresa la vista para registrar un pago con todos los datos nesesarios
     */
    public function create()
    {
        // Obtener el alumno activo
        $Alumnos = VAlumno::All();

        // Obtener los descuentos
        $Desc = Descuento::where('Para', 'Pagos')->get();

        $Conceptos = Concepto::where('Para', 'Pagos')->get();

        //esto deveulve los peridos pendientes por pargar de un alumno
        $Periodos = Periodo::where('Tipo', '!=', 'Colegiatura')->get();


        // Pasar los datos a la vista
        return view(
            'dinamicas.RegisPago',
            [
                'Alumnos' => $Alumnos,
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
        $request->validate([
            'MetodoPago' => 'required',
            'Monto' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Objeto Pago
            $Pago = new Transaccion();

            $Pago->Cantidad = 1;
            $Pago->Tipo = 'Pago';
            $Pago->MetodoPago = $request->input('MetodoPago');

            // Asignar idConcepto desde la tabla Conceptos donde coincide idConcepto elegido en front
            $Pago->idConcepto = $request->input('idConcepto');

            // Asignar idPeriodo desde la tabla Periodos donde coincide Clave elegida en front
            $idPeriodo = Periodo::where('idPeriodo', $request->input('idPeriodo'))->first()->idPeriodo;
            $Pago->idPeriodo = $idPeriodo;

            // Asignar idPersona desde la tabla VAlumnos donde coincide la matrícula con la enviada desde front
            $idPersona = VAlumno::where('Matricula', $request->input('idAlumno'))->first()->idPersona;
            $Pago->idPersona = $idPersona;

            $Pago->Monto = $request->input('Monto');

            //si el valor de $request->input('CuentaRecibido') es null. Si lo es, asigna 'N/A'.
            $Pago->CuentaRecibido = $request->input('CuentaRecibido') ?? 'N/A'; //

            $Pago->save();
            $Pago->CuentaRecibido = 'N/A';

            $Pago->save();
            // Si DescTransaccion tiene algún valor
            if ($request->input('idDescuento')) {
                //

                $PagoDescuento = new DescTransaccion();

                $PagoDescuento->idDescuento = $request->input('idDescuento');
                //id de la transaccion recien registrada
                $idPago = $Pago->idTransaccion;
                $PagoDescuento->idTransaccion = $idPago;
                //

                //calculo del nuevo monto
                $Monto = $request->input('Monto');
                //
                $Descuento = DB::table('Descuentos')->where('idDescuento', $PagoDescuento->idDescuento)->first();
                $TipoDesc = $Descuento->Tipo;
                $CantidadDesc = $Descuento->Monto;

                if ($TipoDesc == 'Porcentual') {
                    // Calcular descuento porcentual
                    $Monto -= ($Monto * ($CantidadDesc / 100));
                } else if ($TipoDesc == 'Fijo') {
                    // Calcular descuento fijo
                    $Monto -= $CantidadDesc;
                }
                $PagoDescuento->save();
                $Pago->Monto = $Monto; //se actualiza el nuevo monto a la transaccion
                //se gurada todo en su respectiva tabla

                $Pago->save();
            }

            //Confirmar transacción

            DB::commit();

            $InfoMail = Vtransacciones::where('idTransaccion', $Pago->idTransaccion)->get();
            //envia un email de confirmacion
            //manda el procesos de mail a segundo plano
            MailConfirmacion::dispatch($InfoMail);

            //falta implementar Enviar un email de confirmacion

            return back()->with('success', 'El pago se registró correctamente, el monto a cobrar es.'
                . $Pago->Monto);
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el pago: ' . $e->getMessage());
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
