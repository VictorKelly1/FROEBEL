<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

class ColegiaturasController extends Controller
{
    /**
       Se refiere a las pagos de los clientes a la institucion como: 
       Colegiaturas.
       
       Index regresa la vista para consultas de pagos, con con los datos vDescTransacciones y vTransacciones
       solamente los datos de la tabla donde la columna Tipo sea pago  y el concepto colegiatura
     */
    public function index()
    {
        //
        $Pagos = Vtransacciones::where('Tipo', 'Pagos')
            ->where('Concepto', 'Colegiatura')
            ->get();
        $PagosDesc = VdescTransacciones::where('Tipo', 'Pagos')
            ->where('Concepto', 'Colegiatura')
            ->get();
        //logica pendiente (pasar solo los pagos que no estan en pagosDesc)
        return view(
            'director.CosultasColegiaturas',
            [
                'Pagos' => $Pagos,
                'PagosDesc' => $PagosDesc,
            ]
        );
    }

    /**
        pasa a la vista para registrar el pago de la colegiatura de un alumno

        pasa los datos: Alumnos, Periodos, Conceptos.
     */
    public function create()
    {
        // Obtener los alumnos activos
        $Alumnos = VAlumno::where('Estado', 'Activo')->get();

        //Descuentos
        $Desc = Descuento::where('Para', 'Pagos')->get();

        // Obtener los periodos que no han sido pagados
        $Periodos = Periodo::where('Clave', 'LIKE', 'C-%')
            ->whereNotIn('Clave', function ($query) {
                $query->select('Clave') // Campo de la vista vTransacciones que contiene la clave del periodo
                    ->from('vTransacciones');
            })
            ->get();
        // Pasar los datos a la vista
        return view(
            'director.RegistrarColegiatura',
            [
                'Alumnos' => $Alumnos,
                'Periodos' => $Periodos,
                'Descuentos' => $Desc,
            ]
        );
    }

    /**
      registra una transaccion de tipo pago con concepto colegiatura 
      y si se aplica un tipo de descuento a la transaccion de almacena de igual manera 
      en DescTransacciones 
     */
    public function store(Request $request)
    {
        $request->validate([
            'MetodoPago' => 'required|string|max:255',
            'Monto' => 'required',
            'CuentaRecibido' => 'required|string',
            'idConcepto' => 'required',
            'idPeriodo' => 'required',
            'idPersona' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Objeto Colegiatura
            $Colegiatura = new Transaccion();

            $Colegiatura->Cantidad = 1;
            $Colegiatura->Tipo = 'Pago';
            $Colegiatura->MetodoPago = $request->input('MetodoPago');

            // Asignar idConcepto desde la tabla Conceptos donde coincide idConcepto elegido en front
            $idConcepto = Concepto::find($request->input('idConcepto'))->idConcepto;
            $Colegiatura->idConcepto = $idConcepto;

            // Asignar idPeriodo desde la tabla Periodos donde coincide Clave elegida en front
            $idPeriodo = Periodo::where('Clave', $request->input('Clave'))->first()->idPeriodo;
            $Colegiatura->idPeriodo = $idPeriodo;

            // Asignar idPersona desde la tabla VAlumnos donde coincide la matrícula con la de front
            $idPersona = VAlumno::where('Matricula', $request->input('Matricula'))->first()->idPersona;
            $Colegiatura->idPersona = $idPersona;

            $Colegiatura->Monto = $request->input('Monto');
            $Colegiatura->CuentaRecibido = $request->input('CuentaRecibido');

            $Colegiatura->save();

            // Si DescTransaccion tiene algún valor
            if ($request->input('Descuento')) {
                //
                $ColegiaturaDescuento = new DescTransaccion();

                $ColegiaturaDescuento->idDescuento = $request->input('Descuento');
                //id de la transaccion recien registrada
                $idColegiatura = $Colegiatura->idTransaccion;
                $ColegiaturaDescuento->idTransaccion = $idColegiatura;

                $ColegiaturaDescuento->save();
            }

            // Confirmar transacción
            DB::commit();

            return back()->with('success', 'El pago se registró correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el pago: ' . $e->getMessage());
        }
    }


    /**
      imprimira un recivo de la transaccion deseada
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
