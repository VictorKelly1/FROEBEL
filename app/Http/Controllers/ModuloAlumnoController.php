<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        // Consultar las calificaciones correspondientes al Alumno
        $Calificaciones = DB::table('vCalificaciones')
            ->where('idAlumno', $idAlumno)
            ->get();

        return view('alumno.Calificaciones', ['Calificaciones' => $Calificaciones]);
    }

    public function horario()
    {
        $Horario = [];
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
        $Colegiaturas = [];
        return view('alumno.Colegiaturas', ['Colegiaturas' => $Colegiaturas]);
    }


    public function pagoColegiatura(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $Monto = $request->input('Monto');;
        $Clave = $request->input('Clave');

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
                        'unit_amount' => $Monto,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => url('/success'),
                'cancel_url' => url('/cancel'),
            ]);

            return redirect($session->url);
        } catch (\Exception $e) {
            // Manejo de errores
            return back()->with('error', $e->getMessage());
        }
    }

    public function guardarColegiatura()
    {
        //
    }
}
