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
    public function create(string $id)
    {
        // Obtener el alumno activo
        $Alumno = VAlumno::where('idAlumno', $id)->first();

        // Obtener los descuentos
        $Desc = Descuento::where('Para', 'Pagos')->get();

        // Obtener el idPersona asociado al alumno
        $idPersona = $Alumno->idPersona; // Suponiendo que `idPersona` está en el modelo `VAlumno`

        // Obtener los periodos cuya clave comienza con "C-" y que no están pagados por este idPersona
        $Periodo = Periodo::where('Clave', 'LIKE', 'C-%')
            ->whereNotIn('Clave', function ($query) use ($idPersona) {
                $query->select('Clave') // Campo que contiene la clave del periodo en transacciones
                    ->from('transacciones')
                    ->where('idPersona', $idPersona); // Filtrar por la persona asociada
            })
            ->get();

        // Pasar los datos a la vista
        return view(
            'director.RegisColegiatura',
            [
                'Alumnos' => $Alumno,
                'Periodos' => $Periodo,
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
            'MetodoPago' => 'required',
            'Monto' => 'required',
            'Matricula' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Objeto Colegiatura
            $Colegiatura = new Transaccion();

            $Colegiatura->Cantidad = 1;
            $Colegiatura->Tipo = 'Pago';
            $Colegiatura->MetodoPago = $request->input('MetodoPago');

            // Asignar idConcepto desde la tabla Conceptos donde coincide idConcepto elegido en front
            $idConcepto = Concepto::where('Nombre', 'Colegiatura')->first()->idConcepto;
            $Colegiatura->idConcepto = $idConcepto;

            // Asignar idPeriodo desde la tabla Periodos donde coincide Clave elegida en front
            $idPeriodo = Periodo::where('idPeriodo', $request->input('idPeriodo'))->first()->idPeriodo;
            $Colegiatura->idPeriodo = $idPeriodo;

            // Asignar idPersona desde la tabla VAlumnos donde coincide la matrícula con la de front
            $idPersona = VAlumno::where('Matricula', $request->input('Matricula'))->first()->idPersona;
            $Colegiatura->idPersona = $idPersona;

            $Colegiatura->Monto = $request->input('Monto');
            $Colegiatura->CuentaRecibido = 'N/A';

            $Colegiatura->save();

            // Si DescTransaccion tiene algún valor
            if ($request->input('idDescuento')) {
                //

                $ColegiaturaDescuento = new DescTransaccion();

                $ColegiaturaDescuento->idDescuento = $request->input('idDescuento');
                //id de la transaccion recien registrada
                $idColegiatura = $Colegiatura->idTransaccion;
                $ColegiaturaDescuento->idTransaccion = $idColegiatura;
                //


                //calculo del nuevo monto
                $Monto = $request->input('Monto');
                //
                $Descuento = DB::table('Descuentos')->where('idDescuento', $ColegiaturaDescuento->idDescuento)->first();
                $TipoDesc = $Descuento->Tipo;
                $CantidadDesc = $Descuento->Monto;

                if ($TipoDesc == 'Porcentual') {
                    // Calcular descuento porcentual
                    $Monto -= ($Monto * ($CantidadDesc / 100));
                } else if ($TipoDesc == 'Fijo') {
                    // Calcular descuento fijo
                    $Monto -= $CantidadDesc;
                }

                // Obtener el día actual para aplicar si esta pagando entre lod dias 
                $day = date('d');
                // Comprobar si el día está entre 01 y 05
                if ($day >= 1 && $day <= 5) {
                    $PagoTemprano = DB::table('Descuentos')
                        ->where('Nombre', 'Pago Temprano')
                        ->first()->Monto;
                    $Monto -= $PagoTemprano;
                }

                $Monto = max(0, $Monto); // Asegura que no sea negativo

                $Colegiatura->Monto = $Monto; //se actualiza el nuevo monto a la transaccion
                //se gurada todo en su respectiva tabla
                $Colegiatura->save();
                $ColegiaturaDescuento->save();
                //
            }
            // Confirmar transacción

            DB::commit();

            return 'succes';
            //return back()->with('success', 'El pago se registró correctamente.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el pago: ' . $e->getMessage());
        }
    }


    /**
      llevara a la vista que imprimira un recivo de la transaccion deseada
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
