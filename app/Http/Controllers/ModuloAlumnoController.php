<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\MailConfirmacion;
use App\Models\Concepto;
use App\Models\Contacto;
use App\Models\Periodo;
use App\Models\Transaccion;
use App\Models\Vtransacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
//
use Stripe\Stripe;
use Stripe\Checkout\Session;



class ModuloAlumnoController extends Controller
{
    /* 
      Menu del Alumno
    */

    public function index()
    {
        return view('alumno.Menu');
    }

    public function calificaciones()
    {
        $idAlumno = session('idAlumno');

        if (!$idAlumno) {
            return response()->json(['error' => 'El idAlumno no está definido en la sesión'], 400);
        }

        $ultimoPeriodo = DB::table('vGruposAlumnos')
            ->select('ClavePeriodo')
            ->get()
            ->map(function ($grupo) {
                return substr($grupo->ClavePeriodo, 0, 4);
            })
            ->max();

        // Consultar las calificaciones correspondientes al Alumno del periodo mas reciente
        $Calificaciones = DB::table('vCalificaciones')
            ->where('idAlumno', $idAlumno)
            ->where('ClavePeriodo', 'LIKE', $ultimoPeriodo . '%')
            ->get();

        if ($Calificaciones->isEmpty()) {
            $Calificaciones = [];
        }

        return view('alumno.Calificaciones', ['Calificaciones' => $Calificaciones]);
    }

    public function horario()
    {
        $idAlumno = FacadesSession::get('idAlumno');
        if (!$idAlumno) {
            abort(403, 'Usuario no autorizado');
        }
        // periodo de grupos actuales 
        $ultimoPeriodo = DB::table('vGruposAlumnos')
            ->select('ClavePeriodo')
            ->get()
            ->map(function ($grupo) {
                return substr($grupo->ClavePeriodo, 0, 4);
            })
            ->max();

        // Obtenemos los grupos de ese período
        $Grupos = DB::table('vGruposAlumnos')
            ->where('idAlumno', $idAlumno)
            ->where('ClavePeriodo', 'LIKE', $ultimoPeriodo . '%')
            ->pluck('idGrupo');
        //

        $GM = DB::table('vGruposMaterias')
            ->whereIn('idGrupo', $Grupos)
            ->pluck('idGrupoMateria');
        //
        $Horario = DB::table('vHorarios')
            ->whereIn('idGrupoMateria', $GM)
            ->get();
        //
        return view('alumno.Horario', ['Horarios' => $Horario]);
    }

    public function inasistencias()
    {
        // Consultar las Inasistencias correspondientes al Alumno
        $Inasistencias = DB::table('vInasistencias')
            ->where('idPersona', session('idPersona'))
            ->get();

        return view('alumno.Inasistencias', ['Inasistencias' => $Inasistencias]);
    }

    public function vistaColegiaturas()
    {
        $idPersona = FacadesSession::get('idPersona');

        $Periodos = DB::table('periodos')
            ->whereNotIn('Clave', function ($query) use ($idPersona) {
                $query->select('Clave')
                    ->from('vTransacciones')
                    ->where('idPersona', $idPersona);
            })
            ->where('Tipo', 'Colegiatura') // Filtrar solo los períodos donde Tipo es 'Colegiatura'
            ->select('*')
            ->get();


        $idAlumno = session('idAlumno'); // Obtener el id del alumno de la sesión

        // Consultar el nivel académico del alumno
        $nivelAcademico = DB::table('vGruposAlumnos')
            ->where('idAlumno', $idAlumno)
            ->value('NivelAcademico'); // Obtener el nivel académico del alumno


        $Costo = DB::table('Membresias')
            ->where('NivelAcademico', $nivelAcademico)
            ->value('Costo');

        $Costo += $Costo * 0.036; //se le suma la comicion de stripe 
        $Costo = number_format($Costo, 2, '.', ''); //formato con 2 decimales

        $Descuento = DB::table('Descuentos')
            ->where('Nombre', 'Pago Temprano')
            ->value('Monto');


        if (!$Descuento) {
            $Descuento = 0; // Valor en caso de no encontrar el descuento
        }

        //
        return view(
            'alumno.Colegiaturas',
            [
                'periodos' => $Periodos,
                'Costo' => $Costo,
                'Descuento' => $Descuento
            ]
        );
    }


    public function pagoColegiatura(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $Costo = $request->input('Costo');
        $Clave = $request->input('Clave');

        $Costo *= 100;

        try {
            // Crear una sesión de checkout
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'mxn',
                        'product_data' => [
                            'name' => 'Colegiatura: ' . $Clave,
                        ],
                        'unit_amount' => $Costo,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => url('/success') . '?Clave=' . $Clave . '&Costo=' . $Costo,
                'cancel_url' => url('/cancel'),
            ]);

            return redirect($session->url);
        } catch (\Exception $e) {
            // Manejo de errores
            return back()->with('error', $e->getMessage());
        }
    }

    public function guardarColegiatura(Request $request)
    {
        //
        $Monto = $request->input('Costo') / 100;

        DB::beginTransaction();

        try {

            // Objeto Colegiatura
            $Colegiatura = new Transaccion();

            $Colegiatura->Cantidad = 1;
            $Colegiatura->Tipo = 'Pago';
            $Colegiatura->MetodoPago = 'Online';

            // Asignar idConcepto desde la tabla Conceptos donde coincide idConcepto elegido en front
            $idConcepto = Concepto::where('Nombre', 'Colegiatura')->first()->idConcepto;
            $Colegiatura->idConcepto = $idConcepto;

            // Asignar idPeriodo desde la tabla Periodos donde coincide Clave elegida en front
            $idPeriodo = Periodo::where('Clave', $request->input('Clave'))->value('idPeriodo');
            $Colegiatura->idPeriodo = $idPeriodo;


            // Asignar idPersona desde la tabla VAlumnos donde coincide la matrícula con la enviada desde front
            $Colegiatura->idPersona = session('idPersona');

            $Colegiatura->Monto = $Monto;

            $Colegiatura->CuentaRecibido = 'Cuenta de Stripe';

            $Colegiatura->save();

            //Confirmar transacción
            DB::commit();

            //obtener el correo de la persona
            $InfoMail = Vtransacciones::where('idTransaccion', $Colegiatura->idTransaccion)->get();

            //manda el procesos de mail a segundo plano
            MailConfirmacion::dispatch($InfoMail);

            $Correo = Contacto::where('TipoContacto', 'Email')
                ->where('idReceptor', session('idPersona'))
                ->value('ValorContacto');


            return redirect()->route('vistaColegiaturas')->with('success', 'El pago se registró correctamente!
                se ha enviado un correo de confirmacion a: ' . $Correo);
        } catch (\Exception $e) {

            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el pago: ' . $e->getMessage());
        }
    }
}
