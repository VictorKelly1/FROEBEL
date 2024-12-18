<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\MailPersonal;
use App\Models\Comunicado;
use App\Models\VAlumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComunicadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     regresa la vista para enviar un comunicado personal 
     */
    public function show(string $id)
    {
        //
        $Alumno = VAlumno::where('idAlumno', $id)->get();
        return view('dinamicas.ComunicadoPerso', ['Alumno' => $Alumno]);
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

    public function ComunicadoPerso(Request $request)
    {
        //Validacion del request -existen

        $request->validate([
            'Titulo' => 'required|string',
            'ComunicadoPersonal' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            //
            $Comunicado = new Comunicado();

            $Comunicado->Titulo = $request->input('Titulo');
            $Comunicado->Adjuntos = $request->input('ComunicadoPersonal');
            $Comunicado->Fecha = today();
            $Comunicado->Destinatarios = $request->input('Destinatario');
            $Comunicado->Medio = 'Email';
            $Comunicado->idEmisor = 1;

            $Comunicado->save();

            // Confirmar transacción 

            $InfoMail = Comunicado::where('idComunicado', $Comunicado->idComunicado)->get();

            MailPersonal::dispatch($InfoMail);
            return 'success';
            DB::commit();



            return redirect()->route('ListaAlumnos')->with('success', 'Comunicado enviado correctamente!.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al enviar: ' . $e->getMessage());
        }
    }
}
