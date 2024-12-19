<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\MailConfirmacion;
//
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
        $Pagos = VTransacciones::where('TipoTransaccion', 'Pago')
            ->where('vTransacciones.TipoTransaccion', 'Pago')
            ->where('vTransacciones.NombreConcepto', 'Colegiatura')
            ->get();
        //pagos que se les aplico descuento
        $PagosDesc = VdescTransacciones::where('TipoTransaccion', 'Pago')
            ->where('NombreConcepto', 'Colegiatura')
            ->get();
        //

        return view(
            'director.ConsultasColeg',
            [
                'Colegiaturas' => $Pagos,
                'ColegiaturaDesc' => $PagosDesc,
            ]
        );
    }

    /**
        pasa a la vista para registrar el pago de la colegiatura de un alumno

        pasa los datos: Alumno, Periodo(el proximo a pagar), Descuentos para colegiaturas.
     */
    public function create(string $id)
    {
        // Obtener el alumno activo
        $Alumno = VAlumno::where('idAlumno', $id)->first();
        //
        $FechaIngreso = $Alumno->FechaIngreso;

        // Obtener los descuentos
        $Desc = Descuento::where('Para', 'Pagos')->get();

        // Obtener el idPersona asociado al alumno
        $idPersona = $Alumno->idPersona;

        //esto deveulve los peridos pendientes por pargar de un alumno
        $Periodo = DB::table('Periodos')
            ->where('Periodos.Clave', 'like', 'C-%')
            ->leftJoin('vTransacciones', function ($join) use ($idPersona) {
                $join->on('Periodos.Clave', '=', 'vTransacciones.Clave')
                    ->where('vTransacciones.idPersona', '=', $idPersona);
            })
            ->whereNull('vTransacciones.Clave')
            ->where('Periodos.FechaInicio', '>', $FechaIngreso)
            ->select('Periodos.*')
            ->get();

        $HistorialColegiaturas = VTransacciones::where('idPersona', $idPersona)
            ->where('NombreConcepto', 'Colegiatura')  // Columna NombreConcepto es Colegiatura
            ->where('TipoTransaccion', 'Pago')         // Columna TipoTransaccion es Pago
            ->get();

        // Pasar los datos a la vista
        return view(
            'dinamicas.RegisColegiatura',
            [
                'Alumnos' => $Alumno,
                'Periodos' => $Periodo,
                'Descuentos' => $Desc,
                'Historial' => $HistorialColegiaturas,
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

            // Asignar idPersona desde la tabla VAlumnos donde coincide la matrícula con la enviada desde front
            $idPersona = VAlumno::where('Matricula', $request->input('idAlumno'))->first()->idPersona;
            $Colegiatura->idPersona = $idPersona;

            $Colegiatura->Monto = $request->input('Monto');

            $Colegiatura->CuentaRecibido = $request->input('CuentaRecibido') ?? 'N/A'; //

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
                $ColegiaturaDescuento->save();
                $Colegiatura->Monto = $Monto; //se actualiza el nuevo monto a la transaccion
                //se gurada todo en su respectiva tabla

                $Colegiatura->save();
            }

            // Mapeo de claves a rangos de meses
            $mesesPorClave = [
                'EF' => ['01', '02'], // Enero - Febrero
                'FM' => ['02', '03'], // Febrero - Marzo
                'MA' => ['03', '04'], // Marzo - Abril
                'AM' => ['04', '05'], // Abril - Mayo
                'MJ' => ['05', '06'],
                'JJ' => ['06', '07'],
                'JA' => ['07', '08'],
                'AS' => ['08', '09'],
                'SO' => ['09', '10'],
                'ON' => ['10', '11'],
                'ND' => ['11', '12'],
                'DE' => ['12', '01'],
            ];

            // Obtener el día y mes actuales
            $day = date('d');
            $MesActual = date('m');
            $yearActual = date('y');

            // Obtener la clave correspondiente al idPeriodo recibido en la solicitud
            $Clave = DB::table('Periodos')
                ->where('idPeriodo', $request->input('idPeriodo'))
                ->value('Clave');


            $claveMes = substr($Clave, 2, 2);
            $claveYear = substr($Clave, -2); // Extrae los dos últimos caracteres

            // Validar si la clave existe en el mapeo, si el mes actual está en el rango, si el día está entre 1 y 5 y si el año es el actual
            if (
                isset($mesesPorClave[$claveMes]) &&
                in_array($MesActual, $mesesPorClave[$claveMes]) &&
                $day >= 1 && $day <= 5 && // El día debe estar entre 1 y 5
                $claveYear === $yearActual // El año de la clave debe coincidir con el año actual
            ) {
                // Obtener el monto del descuento
                $PagoTemprano = DB::table('Descuentos')
                    ->where('Nombre', 'Pago Temprano')
                    ->first()->Monto;

                $Monto -= $PagoTemprano;
                $Monto = max(0, $Monto);
                //

                $Colegiatura->Monto = $Monto; //se actualiza el nuevo monto a la transaccion
                //se gurada todo en su respectiva tabla
                $Colegiatura->save();
            }

            //Confirmar transacción
            DB::commit();

            //obtener el correo de la persona
            $InfoMail = Vtransacciones::where('idTransaccion', $Colegiatura->idTransaccion)->get();

            //manda el procesos de mail a segundo plano
            MailConfirmacion::dispatch($InfoMail);

            return back()->with('success', 'El pago se registró correctamente, el monto a cobrar es.'
                . $Colegiatura->Monto);
        } catch (\Exception $e) {

            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el pago: ' . $e->getMessage());
        }
    }


    public function FaltantesPagos(Request $request)
    {

        $Clave = $request->input('Clave');

        // Verifica si la clave existe en la tabla Periodos para que no regrese consultas a claves que no existen
        $existeClave = DB::table('Periodos')->where('Clave', $Clave)->exists();

        if (!$existeClave) {
            // Si la clave no existe, devolver la vista con $Faltantes vacío
            $Faltantes = [];
            return view('director.Colegfaltantes', ['Faltantes' => $Faltantes]);
        }

        // Consulta para obtener los alumnos que no han pagado la colegiatura con la clave buscada
        $Faltantes = DB::table('vAlumnos')
            ->leftJoin('vTransacciones', function ($join) use ($Clave) {
                $join->on('vAlumnos.idPersona', '=', 'vTransacciones.idPersona')
                    ->where('vTransacciones.Clave', '=', $Clave)
                    ->where('vTransacciones.NombreConcepto', '=', 'Colegiatura')
                    ->where('vTransacciones.TipoTransaccion', '=', 'pago');
            })
            ->whereNull('vTransacciones.idTransaccion')
            ->select('vAlumnos.*')
            ->get();

        return view(
            'director.Colegfaltantes',
            [
                'Faltantes' => $Faltantes,
            ]
        );
    }
}
