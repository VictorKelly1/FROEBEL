<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodosController extends Controller
{
    public function index()
    {
        //
        $Periodos = Periodo::where(function ($query) {
            $query->where('Clave', 'LIKE', 'I-%')
                ->orWhere('Clave', 'LIKE', 'C-%')
                ->orWhere('Clave', 'LIKE', 'E-%')
                ->orWhere('Clave', 'LIKE', 'V-%');
        })
            ->orderBy('created_at', 'DESC')
            ->paginate(50);

        return view('director.RegisPeriodo', ['Periodos' => $Periodos]);
    }

    //almacena un periodo de tipo C- (colegiatura) para poder pagarlo 
    public function store(Request $request)
    {
        //

        $request->validate([
            'Clave' => 'required|string',
            'FechaInicio' => 'required',
            'FechaFin' => 'required',
            'Tipo' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            //
            $Periodo = new Periodo();

            $Periodo->Clave = $request->input('Clave');
            $Periodo->FechaInicio = $request->input('FechaInicio');
            $Periodo->FechaFin = $request->input('FechaFin');
            if ($request->input('Tipo') === 'verano' || $request->input('Tipo') === 'extraescolar') {
                $Periodo->Tipo = "-" . $request->input('Tipo');
            } else {
                $Periodo->Tipo = $request->input('Tipo');
            }


            $Periodo->save();

            // Confirmar transacción 
            DB::commit();

            return redirect()->route('ListaPeriodos')->with('success', 'Periodo registrado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el periodo: ' . $e->getMessage());
        }
    }
}
