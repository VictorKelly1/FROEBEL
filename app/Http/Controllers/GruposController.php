<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grado;
use App\Models\Grupo;
use App\Models\Periodo;
use App\Models\Vgrupos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GruposController extends Controller
{

    public function index()
    {
        /* 
        Se obtiene una lista con todos los Grupos
        */
        $Grupos = Vgrupos::All();
        return view('director.ConsultasGrup', ['Grupos' => $Grupos]);
    }

    public function create()
    {
        /*
        Regresa la vista para registrar un alumno
        */
        return view('director.RegisGrup');
    }


    public function store(Request $request)
    {
        /* 
        Funcion para registrar un alumno en la base de datos guardando los datos en las respectivas
        tablas y asignandole un correo al momento de su creacion para que tenga acceso al sistema
        */

        //Validacion del request -existen
        $request->validate([
            'NombreGrado' => 'required|string',
            'NivelAcademico' => 'required|string',
            'Clave' => 'required|string',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date',
            'Tipo' => 'required|string',
        ]);

        /*   */

        //Integridad -filtro de correcion de sintaxis(en el modelo)           
        //Verificacion -requerimientos (en el modelo) 


        DB::beginTransaction();

        try {
            // Objeto Grado
            $Grado = new Grado();

            $Grado->NombreGrado = $request->input('NombreGrado');
            $Grado->NivelAcademico = $request->input('NivelAcademico');

            $Grado->save();

            //Objeto Periodo
            $Periodo = new Periodo();

            $Periodo->Clave = $request->input('Clave');
            $Periodo->FechaInicio = $request->input('FechaInicio');
            $Periodo->FechaFin = $request->input('FechaFin');
            $Periodo->Tipo = $request->input('Tipo');

            $Periodo->save();


            // Obtener IDs de las tuplas que se acaban de guardar
            $idGrado = $Grado->id;
            $idPeriodo = $Periodo->id;

            //Objeto Grupo
            $Grupo = new Grupo();

            $Grupo->CantidadAlum = $request->input('CantidadAlum');
            $Grupo->Paquete = $request->input('Paquete');
            $Grupo->idGrado = $idGrado;
            $Grupo->idPeriodo = $idPeriodo;

            $Grupo->save();

            // Confirmar transacción 
            DB::commit();

            return redirect()->view('director.RegisGrup')->with('success', 'Grupo registrado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Grupo: ' . $e->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Vgrupos $id)
    {
        //regresa la vista para la edicion 
        if (!$id) {
            return response()->json(['error' => 'Grupo no encontrado'], 404);
        } else {
            return view('dinamicas.EditarGrupo', ['Docente' => $id]);
        }
    }


    public function update(Request $request, string $id)
    {
        /* */
        $request->validate([
            'NombreGrado' => 'required|string',
            'NivelAcademico' => 'required|string',
            'Clave' => 'required|string',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date',
            'Tipo' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            // Objeto Grado
            $Grado = new Grado();

            $Grado->NombreGrado = $request->input('NombreGrado');
            $Grado->NivelAcademico = $request->input('NivelAcademico');

            $Grado->save();

            //Objeto Periodo
            $Periodo = new Periodo();

            $Periodo->Clave = $request->input('Clave');
            $Periodo->FechaInicio = $request->input('FechaInicio');
            $Periodo->FechaFin = $request->input('FechaFin');
            $Periodo->Tipo = $request->input('Tipo');

            $Periodo->save();

            // Obtener IDs de las tuplas que se acaban de guardar

            //Objeto Grupo
            $Grupo = new Grupo();

            $Grupo->CantidadAlum = $request->input('CantidadAlum');
            $Grupo->Paquete = $request->input('Paquete');

            $Grupo->save();

            // Confirmar transacción 
            DB::commit();
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al actualizar el grupo: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
