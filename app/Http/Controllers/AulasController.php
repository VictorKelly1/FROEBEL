<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AulasController extends Controller
{
    /* 
    Se obtiene una lista con todos las aulas existentes
    */
    public function index()
    {
        $Aulas = Aula::All();
        return view('director.ConsultasAulas', ['Aulas' => $Aulas]);
    }

    /*
    Regresa la vista para registrar un alumno
    */
    public function create()
    {
        return view('director.RegisAula');
    }

    /* 
    Funcion para registrar un alumno en la base de datos guardando los datos en las respectivas
    tablas y asignandole un correo al momento de su creacion para que tenga acceso al sistema
    */
    public function store(Request $request)
    {


        //Validacion del request -existen
        $request->validate([
            'Nombre' => 'required|string',
            'Capacidad' => 'required',
            'Edificio' => 'required|string',
            'Piso' => 'required|string',
            'Tipo' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            //
            $Aula = new Aula();

            $Aula->Nombre = $request->input('Nombre');
            $Aula->Capacidad = $request->input('Capacidad');
            $Aula->Edificio = $request->input('Edificio');
            $Aula->Piso = $request->input('Piso');
            $Aula->Tipo = $request->input('Tipo');

            $Aula->save();

            // Confirmar transacción 
            DB::commit();

            return redirect()->route('ListaAulas')->with('success', 'Aula registrada con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Aula: ' . $e->getMessage());
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
    public function edit(Aula $id)
    {
        if (!$id) {
            return response()->json(['error' => 'Aula no encontrado'], 404);
        } else {
            return view('dinamicas.EditarAula', ['Aula' => $id]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*
        Actualiza los datos de un alumno especifico
        */

        //Validacion del request -Existen
        $request->validate([
            'Nombre' => 'required',
            'Capacidad' => 'required',
            'Edificio' => 'required',
            'Piso' => 'required',
            'Tipo' => 'required',
        ]);

        DB::beginTransaction();
        return 'Aqui';
        try {

            //
            $Aula = Aula::findOrFail($id);

            $Aula->Nombre = $request->input('Nombre');
            $Aula->Capacidad = $request->input('Capacidad');
            $Aula->Nombre = $request->input('Edificio');
            $Aula->Nombre = $request->input('Piso');
            $Aula->Nombre = $request->input('Tipo');

            $Aula->save();

            DB::commit();

            // Retornar una respuesta indicando éxito
            return redirect()->route('ListaAulas')->with('success', 'Aula actualizado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();
            return 'error';
            return redirect()->back()->with('error', 'Error al actualizar el Aula: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
