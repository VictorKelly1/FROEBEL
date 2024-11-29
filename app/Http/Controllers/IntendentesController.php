<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Intendente;
use App\Models\Persona;
use App\Models\VIntendente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntendentesController extends Controller
{

    public function index()
    {
        /* 
        Se obtiene una lista con todos los Intendentes activos
        */
        $Intendentes = VIntendente::where('Estado', 'Activo')->get();
        return view('director.ConsultasInten', ['Intendentes' => $Intendentes]);
    }


    public function create()
    {
        /*
        Regresa la vista para registrar un alumno
        */
        return view('director.RegisInten');
    }

    public function store(Request $request)
    {
        /* 
        Funcion para registrar un Intendente en la base de datos guardando los datos en las respectivas
        tablas y asignandole un correo al momento de su creacion para que tenga acceso al sistema
        */
        $request->validate([
            'Nombre' => 'required|string',
            'ApellidoMaterno' => 'required|string',
            'ApellidoPaterno' => 'required|string',
            'Ciudad' => 'required|string',
            'Municipio' => 'required|string',
            'ColFrac' => 'required|string',
            'Calle' => 'required|string',
            'EstadoCivil' => 'required|string',
            'Nacionalidad' => 'required|string',
            'Matricula' => 'required|string',
            'EscuelaProcede' => 'required|string',
            'Correo' => 'required|unique:users,email',
            'FechaNacimiento' => 'required|date|before:today',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'RFC' => [
                'required',
                'regex:/^[A-ZÑ&]{3,4}[0-9]{6}[A-Z0-9]{3}$/i'
            ],
            'CURP' => [
                'required',
                'regex:/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9]{2}$/i'
            ],
        ]);

        DB::beginTransaction();

        try {
            // Objeto Persona
            $Persona = new Persona();
            $Persona->Nombre = $request->input('Nombre');
            $Persona->ApellidoMaterno = $request->input('ApellidoMaterno');
            $Persona->ApellidoPaterno = $request->input('ApellidoPaterno');
            $Persona->CURP = $request->input('CURP');
            $Persona->FechaNacimiento = $request->input('FechaNacimiento');
            $Persona->Genero = $request->input('Genero');
            $Persona->Ciudad = $request->input('Ciudad');
            $Persona->Municipio = $request->input('Municipio');
            $Persona->CodigoPostal = $request->input('CodigoPostal');
            $Persona->ColFrac = $request->input('ColFrac');
            $Persona->Calle = $request->input('Calle');
            $Persona->NumeroExterior = $request->input('NumeroExterior');
            $Persona->EstadoCivil = $request->input('EstadoCivil');
            $Persona->Nacionalidad = $request->input('Nacionalidad');

            if ($request->hasFile('Foto')) {
                $rutaFoto = $request->file('Foto')->store('fotos', 'public');
                $Persona->Foto = $rutaFoto;
            } else {
                $Persona->Foto = null;
            }

            $Persona->save();

            // Objeto Coordinador
            // Obtener IDs de las tuplas que se acaban de guardar
            $idPersona = $Persona->id;

            $Intendente = new Intendente();
            $Intendente->Estado = 'Activo';
            $Intendente->RFC = $request->input('RFC');
            $Intendente->NoINE = $request->input('NoINE');
            $Intendente->Sueldo = $request->input('Sueldo');
            $Intendente->idPersona = $idPersona;

            $Intendente->save();

            // Confirmar transacción
            DB::commit();

            return redirect()->route('ListaInten')->with('success', 'Intendente registrado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al registrar el Intendente: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(VIntendente $id)
    {
        /*
        Regresa la vista dinamica para editar un Intendente 
        */

        // Verificar si se encontró el Intendente
        if (!$id) {
            return response()->json(['error' => 'Intendente no encontrado'], 404);
        } else {
            return view('dinamicas.EditarInten', ['Intendente' => $id]);
        }
    }

    public function update(Request $request, string $id)
    {
        /* */
        $request->validate([
            'Nombre' => 'required|string',
            'ApellidoMaterno' => 'required|string',
            'ApellidoPaterno' => 'required|string',
            'Ciudad' => 'required|string',
            'Municipio' => 'required|string',
            'ColFrac' => 'required|string',
            'Calle' => 'required|string',
            'EstadoCivil' => 'required|string',
            'Nacionalidad' => 'required|string',
            'FechaNacimiento' => 'required|date|before:today',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',

            'RFC' => [
                'required',
                'regex:/^[A-ZÑ&]{3,4}[0-9]{6}[A-Z0-9]{3}$/i'
            ],
            'CURP' => [
                'required',
                'regex:/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9]{2}$/i'
            ],
        ]);
        DB::beginTransaction();

        try {
            // Buscar al Intendente por su ID
            $Intendente = Intendente::findOrFail($id);

            $Intendente->Estado = 'Activo';
            $Intendente->RFC = $request->input('RFC');
            $Intendente->NoINE = $request->input('NoINE');
            $Intendente->Sueldo = $request->input('Sueldo');

            $Intendente->Save();

            $idPersona = $Intendente->idPersona;

            $Persona = Persona::findOrFail($idPersona);

            $Persona->Nombre = $request->input('Nombre');
            $Persona->ApellidoMaterno = $request->input('ApellidoMaterno');
            $Persona->ApellidoPaterno = $request->input('ApellidoPaterno');
            $Persona->CURP = $request->input('CURP');
            $Persona->FechaNacimiento = $request->input('FechaNacimiento');
            $Persona->Genero = $request->input('Genero');
            $Persona->Ciudad = $request->input('Ciudad');
            $Persona->Municipio = $request->input('Municipio');
            $Persona->CodigoPostal = $request->input('CodigoPostal');
            $Persona->ColFrac = $request->input('ColFrac');
            $Persona->Calle = $request->input('Calle');
            $Persona->NumeroExterior = $request->input('NumeroExterior');
            $Persona->EstadoCivil = $request->input('EstadoCivil');
            $Persona->Nacionalidad = $request->input('Nacionalidad');

            $Persona->save();

            DB::commit();

            // Retornar una respuesta indicando éxito
            return redirect()->route('ListaAdmin')->with('success', 'Administrador actualizado con éxito.');
        } catch (\Exception $e) {
            // Revertir transacción si hay un error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al actualizar el Intendente: ' . $e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        //
    }
}
